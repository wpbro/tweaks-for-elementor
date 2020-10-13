import axios from 'axios';
import getCookie from './get-cookie';
import setCookie from './set-cookie';

//Return country value promise based on ISO 3166-1 alpha-2 codes
export default () => {
	const langHtml = document.getElementsByTagName('html')[0].getAttribute('lang');
	const siteCountry = langHtml.length > 3 ? langHtml.slice(3) : langHtml.toUpperCase();
	const countryCookie = getCookie('user_country');
	const customCountry = (typeof intlElementorData !== 'undefined') ? intlElementorData.customCountryId : '';
	const ipInfoToken = (typeof intlElementorData !== 'undefined') && intlElementorData.apiKey ? `?token=${intlElementorData.apiKey}` : '';

	return new Promise((resolve) => {

		if(customCountry) {
			resolve(customCountry); //Return custom code override if it setup in the admin
		} else if(ipInfoToken) { //Used IP detection based on ipinfo.io service if we setup the API key in the admin

			if(countryCookie) {
				resolve(countryCookie); //Return cookie with country code if we already have it
			} else {
				axios
					.get(`https://ipinfo.io${ipInfoToken}`)
					.then(response => {
						const {country} = response.data;
						setCookie('user_country', country, 90);
						resolve(country); //Return ipinfo.io country code based by user geo
					})
					.catch(err => resolve(siteCountry)); //Resolve site lang country if we've got an error
			}

		} else {
			resolve(siteCountry); //Resolve site lang country in other cases
		}

	});
}

