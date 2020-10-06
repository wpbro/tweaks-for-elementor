import intlTelInput from 'intl-tel-input/build/js/intlTelInput';
import utils from 'intl-tel-input/build/js/utils.js';
import getCountry from '../helpers/get-country';

export default function () {

	const phoneFields = document.querySelectorAll('[type*=tel]');

	getCountry().then((country) => {
		console.log(country);
		phoneFields.forEach((field) => intlInit(field, country));
	})

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
