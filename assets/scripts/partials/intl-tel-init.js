import intlTelInput from 'intl-tel-input/build/js/intlTelInput';
import utils from 'intl-tel-input/build/js/utils.js';
import getCountry from '../helpers/get-country';

export default function () {

	const phoneFields = document.querySelectorAll('[type*=tel]'); //Get all type=tel fields

	getCountry().then((country) => {
		phoneFields.forEach((field) => intlInit(field, country)); //Setup intl tel for each type=tel fields
	})

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

		field.addEventListener('input', () => handleChange(iti, field));
	}

	function handleChange(iti, input) {
		input.value = iti.getNumber();
	}
}
