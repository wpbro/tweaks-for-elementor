import axios from 'axios';
import getCookie from './get-cookie';
import setCookie from './set-cookie';

export default () => {
	const langHtml = document.getElementsByTagName('html')[0].getAttribute('lang');
	const siteCountry = langHtml.length > 3 ? langHtml.slice(3) : langHtml.toUpperCase();
	const countryCookie = getCookie('user_country');
	const customCountry = (typeof intlElementorData !== 'undefined') ? intlElementorData.customCountryId : '';
	const ipInfoToken = (typeof intlElementorData !== 'undefined') && intlElementorData.apiKey ? `?token=${intlElementorData.apiKey}` : '';

	return new Promise((resolve) => {

		if(customCountry) {
			resolve(customCountry);
		} else if(ipInfoToken) {

			if(countryCookie) {
				resolve(countryCookie);
			} else {
				axios
					.get(`https://ipinfo.io${ipInfoToken}`)
					.then(response => {
						const {country} = response.data;
						setCookie('user_country', country, 90);
						resolve(country);
					})
					.catch(err => resolve(siteCountry));
			}

		} else {
			resolve(siteCountry);
		}

	});
}

