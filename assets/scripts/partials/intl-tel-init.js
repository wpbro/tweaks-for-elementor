import intlTelInput from 'intl-tel-input/build/js/intlTelInput';
import utils from 'intl-tel-input/build/js/utils.js';
import getCountry from '../helpers/get-country';

export default function () {

	const phoneFields = document.querySelectorAll('[type*=tel]'); //Get all type=tel fields
	const customCountryField = (typeof intlElementorData !== 'undefined') ? intlElementorData.customCountryField : ''; //Get the custom country field name

	getCountry().then((country) => {
		phoneFields.forEach((field) => intlInit(field, country)); //Setup intl tel for each type=tel fields
	});

	//This function init intl tel for each type=tel fields
	const intlInit = (field, country) => {
		const iti = intlTelInput(field, {
			separateDialCode: false,
			nationalMode: false,
			initialCountry: country,
			utilsScript: utils,
			autoPlaceholder: 'aggressive',
			placeholderNumberType: 'FIXED_LINE'
		});

		field.addEventListener('change', () => handleChange(iti, field)); // Add change event for each tel input
		field.addEventListener('countrychange', () => countryChange(iti, field)); //Add country change event for each tel input
		countryChange(iti, field); //Fill the custom country field
	}

	function handleChange(iti, input) {
		const required = input.getAttribute('required');
		input.value = iti.getNumber(); //Change current number on the formatted version with +

		if(required) { //Change the error class for required field
			iti.isValidNumber() ? input.classList.remove('is-error') : input.classList.add('is-error');
		}
	}

	function countryChange(iti, input) {
		const form = input.closest('form');
		const countryField = form.querySelector('#form-field-' + customCountryField); //Find the custom country field name
		const currentCountry = iti.getSelectedCountryData().iso2.toUpperCase(); //Get ISO2 country name

		if(countryField) {
			countryField.value = currentCountry; //Fill the custom country field if exist
		}
	}
}
