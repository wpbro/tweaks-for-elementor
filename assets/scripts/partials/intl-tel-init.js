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
		intlTelInput(field, {
			separateDialCode: true,
			nationalMode: false,
			initialCountry: country,
			preferredCountries: [],
			utilsScript: utils,
			autoPlaceholder: 'aggressive',
			placeholderNumberType: 'FIXED_LINE',
		});
	}
}
