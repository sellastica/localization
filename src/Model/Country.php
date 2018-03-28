<?php
namespace Sellastica\Localization\Model;

use Sellastica\Localization\Presentation\CountryProxy;
use Sellastica\Twig\Model\IProxable;
use Sellastica\Twig\Model\ProxyConverter;

class Country implements IProxable
{
	/**
	 * @var array ISO 3166-1
	 */
	private static $countries = [
		'AF' => 'system.countries.afghanistan',
		'AX' => 'system.countries.aland_islands',
		'AL' => 'system.countries.albania',
		'DZ' => 'system.countries.algeria',
		'AS' => 'system.countries.american_samoa',
		'AD' => 'system.countries.andorra',
		'AO' => 'system.countries.angola',
		'AI' => 'system.countries.anguilla',
		'AQ' => 'system.countries.antarctica',
		'AG' => 'system.countries.antigua_and_barbuda',
		'AR' => 'system.countries.argentina',
		'AM' => 'system.countries.armenia',
		'AW' => 'system.countries.aruba',
		'AU' => 'system.countries.australia',
		'AT' => 'system.countries.austria',
		'AZ' => 'system.countries.azerbaijan',
		'BS' => 'system.countries.bahamas',
		'BH' => 'system.countries.bahrain',
		'BD' => 'system.countries.bangladesh',
		'BB' => 'system.countries.barbados',
		'BY' => 'system.countries.belarus',
		'BE' => 'system.countries.belgium',
		'BZ' => 'system.countries.belize',
		'BJ' => 'system.countries.benin',
		'BM' => 'system.countries.bermuda',
		'BT' => 'system.countries.bhutan',
		'BO' => 'system.countries.bolivia',
		'BA' => 'system.countries.bosnia_and_herzegovina',
		'BW' => 'system.countries.botswana',
		'BV' => 'system.countries.bouvet_island',
		'BR' => 'system.countries.brazil',
		'IO' => 'system.countries.british_indian_ocean_territory',
		'BN' => 'system.countries.brunei_darussalam',
		'BG' => 'system.countries.bulgaria',
		'BF' => 'system.countries.burkina_faso',
		'BI' => 'system.countries.burundi',
		'KH' => 'system.countries.cambodia',
		'CM' => 'system.countries.cameroon',
		'CA' => 'system.countries.canada',
		'CV' => 'system.countries.cape_verde',
		'KY' => 'system.countries.cayman_islands',
		'CF' => 'system.countries.central_african_republic',
		'TD' => 'system.countries.chad',
		'CL' => 'system.countries.chile',
		'CN' => 'system.countries.china',
		'CX' => 'system.countries.christmas_island',
		'CC' => 'system.countries.cocos_islands',
		'CO' => 'system.countries.colombia',
		'KM' => 'system.countries.comoros',
		'CG' => 'system.countries.congo',
		'CD' => 'system.countries.congo_democratic_republic',
		'CK' => 'system.countries.cook_islands',
		'CR' => 'system.countries.costa_rica',
		'CI' => 'system.countries.cote_d_ivoire',
		'HR' => 'system.countries.croatia',
		'CU' => 'system.countries.cuba',
		'CY' => 'system.countries.cyprus',
		'CZ' => 'system.countries.czech_republic',
		'DK' => 'system.countries.denmark',
		'DJ' => 'system.countries.djibouti',
		'DM' => 'system.countries.dominica',
		'DO' => 'system.countries.dominican_republic',
		'EC' => 'system.countries.ecuador',
		'EG' => 'system.countries.egypt',
		'SV' => 'system.countries.el_salvador',
		'GQ' => 'system.countries.equatorial_guinea',
		'ER' => 'system.countries.eritrea',
		'EE' => 'system.countries.estonia',
		'ET' => 'system.countries.ethiopia',
		'FK' => 'system.countries.falkland_islands_malvinas',
		'FO' => 'system.countries.faroe_islands',
		'FJ' => 'system.countries.fiji',
		'FI' => 'system.countries.finland',
		'FR' => 'system.countries.france',
		'GF' => 'system.countries.french_guiana',
		'PF' => 'system.countries.french_polynesia',
		'TF' => 'system.countries.french_southern_territories',
		'GA' => 'system.countries.gabon',
		'GM' => 'system.countries.gambia',
		'GE' => 'system.countries.georgia',
		'DE' => 'system.countries.germany',
		'GH' => 'system.countries.ghana',
		'GI' => 'system.countries.gibraltar',
		'GR' => 'system.countries.greece',
		'GL' => 'system.countries.greenland',
		'GD' => 'system.countries.grenada',
		'GP' => 'system.countries.guadeloupe',
		'GU' => 'system.countries.guam',
		'GT' => 'system.countries.guatemala',
		'GG' => 'system.countries.guernsey',
		'GN' => 'system.countries.guinea',
		'GW' => 'system.countries.guinea_bissau',
		'GY' => 'system.countries.guyana',
		'HT' => 'system.countries.haiti',
		'HM' => 'system.countries.heard_island_mcdonald_islands',
		'VA' => 'system.countries.vatican_city',
		'HN' => 'system.countries.honduras',
		'HK' => 'system.countries.hong_kong',
		'HU' => 'system.countries.hungary',
		'IS' => 'system.countries.iceland',
		'IN' => 'system.countries.india',
		'ID' => 'system.countries.indonesia',
		'IR' => 'system.countries.iran',
		'IQ' => 'system.countries.iraq',
		'IE' => 'system.countries.ireland',
		'IM' => 'system.countries.isle_of_man',
		'IL' => 'system.countries.israel',
		'IT' => 'system.countries.italy',
		'JM' => 'system.countries.jamaica',
		'JP' => 'system.countries.japan',
		'JE' => 'system.countries.jersey',
		'JO' => 'system.countries.jordan',
		'KZ' => 'system.countries.kazakhstan',
		'KE' => 'system.countries.kenya',
		'KI' => 'system.countries.kiribati',
		'KR' => 'system.countries.korea',
		'KW' => 'system.countries.kuwait',
		'KG' => 'system.countries.kyrgyzstan',
		'LA' => 'system.countries.lao_peoples_democratic_republic',
		'LV' => 'system.countries.latvia',
		'LB' => 'system.countries.lebanon',
		'LS' => 'system.countries.lesotho',
		'LR' => 'system.countries.liberia',
		'LY' => 'system.countries.libyan_arab_jamahiriya',
		'LI' => 'system.countries.liechtenstein',
		'LT' => 'system.countries.lithuania',
		'LU' => 'system.countries.luxembourg',
		'MO' => 'system.countries.macao',
		'MK' => 'system.countries.macedonia',
		'MG' => 'system.countries.madagascar',
		'MW' => 'system.countries.malawi',
		'MY' => 'system.countries.malaysia',
		'MV' => 'system.countries.maldives',
		'ML' => 'system.countries.mali',
		'MT' => 'system.countries.malta',
		'MH' => 'system.countries.marshall_islands',
		'MQ' => 'system.countries.martinique',
		'MR' => 'system.countries.mauritania',
		'MU' => 'system.countries.mauritius',
		'YT' => 'system.countries.mayotte',
		'MX' => 'system.countries.mexico',
		'FM' => 'system.countries.micronesia',
		'MD' => 'system.countries.moldova',
		'MC' => 'system.countries.monaco',
		'MN' => 'system.countries.mongolia',
		'ME' => 'system.countries.montenegro',
		'MS' => 'system.countries.montserrat',
		'MA' => 'system.countries.morocco',
		'MZ' => 'system.countries.mozambique',
		'MM' => 'system.countries.myanmar',
		'NA' => 'system.countries.namibia',
		'NR' => 'system.countries.nauru',
		'NP' => 'system.countries.nepal',
		'NL' => 'system.countries.netherlands',
		'AN' => 'system.countries.netherlands_antilles',
		'NC' => 'system.countries.new_caledonia',
		'NZ' => 'system.countries.new_zealand',
		'NI' => 'system.countries.nicaragua',
		'NE' => 'system.countries.niger',
		'NG' => 'system.countries.nigeria',
		'NU' => 'system.countries.niue',
		'NF' => 'system.countries.norfolk_Island',
		'MP' => 'system.countries.northern_mariana_islands',
		'NO' => 'system.countries.norway',
		'OM' => 'system.countries.oman',
		'PK' => 'system.countries.pakistan',
		'PW' => 'system.countries.palau',
		'PS' => 'system.countries.palestinian_Territory,_Occupied',
		'PA' => 'system.countries.panama',
		'PG' => 'system.countries.papua_new_guinea',
		'PY' => 'system.countries.paraguay',
		'PE' => 'system.countries.peru',
		'PH' => 'system.countries.philippines',
		'PN' => 'system.countries.pitcairn',
		'PL' => 'system.countries.poland',
		'PT' => 'system.countries.portugal',
		'PR' => 'system.countries.puerto_rico',
		'QA' => 'system.countries.qatar',
		'RE' => 'system.countries.reunion',
		'RO' => 'system.countries.romania',
		'RU' => 'system.countries.russian_federation',
		'RW' => 'system.countries.rwanda',
		'BL' => 'system.countries.saint_barthelemy',
		'SH' => 'system.countries.saint_helena',
		'KN' => 'system.countries.saint_kitts_and_nevis',
		'LC' => 'system.countries.saint_lucia',
		'MF' => 'system.countries.saint_martin',
		'PM' => 'system.countries.saint_pierre_and_miquelon',
		'VC' => 'system.countries.saint_vincent_and_grenadines',
		'WS' => 'system.countries.samoa',
		'SM' => 'system.countries.san_marino',
		'ST' => 'system.countries.sao_tome_and_principe',
		'SA' => 'system.countries.saudi_arabia',
		'SN' => 'system.countries.senegal',
		'RS' => 'system.countries.serbia',
		'SC' => 'system.countries.seychelles',
		'SL' => 'system.countries.sierra_leone',
		'SG' => 'system.countries.singapore',
		'SK' => 'system.countries.slovakia',
		'SI' => 'system.countries.slovenia',
		'SB' => 'system.countries.solomon_islands',
		'SO' => 'system.countries.somalia',
		'ZA' => 'system.countries.south_africa',
		'GS' => 'system.countries.south_georgia_and_sandwich_isl',
		'ES' => 'system.countries.spain',
		'LK' => 'system.countries.sri_lanka',
		'SD' => 'system.countries.sudan',
		'SR' => 'system.countries.suriname',
		'SJ' => 'system.countries.svalbard_and_jan_mayen',
		'SZ' => 'system.countries.swaziland',
		'SE' => 'system.countries.sweden',
		'CH' => 'system.countries.switzerland',
		'SY' => 'system.countries.syrian_arab_republic',
		'TW' => 'system.countries.taiwan',
		'TJ' => 'system.countries.tajikistan',
		'TZ' => 'system.countries.tanzania',
		'TH' => 'system.countries.thailand',
		'TL' => 'system.countries.timor_leste',
		'TG' => 'system.countries.togo',
		'TK' => 'system.countries.tokelau',
		'TO' => 'system.countries.tonga',
		'TT' => 'system.countries.trinidad_and_tobago',
		'TN' => 'system.countries.tunisia',
		'TR' => 'system.countries.turkey',
		'TM' => 'system.countries.turkmenistan',
		'TC' => 'system.countries.turks_and_caicos_islands',
		'TV' => 'system.countries.tuvalu',
		'UG' => 'system.countries.uganda',
		'UA' => 'system.countries.ukraine',
		'AE' => 'system.countries.united_arab_emirates',
		'GB' => 'system.countries.united_kingdom',
		'US' => 'system.countries.united_states',
		'UM' => 'system.countries.united_states_outlying_islands',
		'UY' => 'system.countries.uruguay',
		'UZ' => 'system.countries.uzbekistan',
		'VU' => 'system.countries.vanuatu',
		'VE' => 'system.countries.venezuela',
		'VN' => 'system.countries.viet_nam',
		'VG' => 'system.countries.virgin_islands_british',
		'VI' => 'system.countries.virgin_islands_us',
		'WF' => 'system.countries.wallis_and_futuna_islands',
		'EH' => 'system.countries.western_sahara',
		'YE' => 'system.countries.yemen',
		'ZM' => 'system.countries.zambia',
		'ZW' => 'system.countries.zimbabwe',
	];

	/**
	 * @var array European Union country codes
	 * @see https://www.gov.uk/guidance/vat-eu-country-codes-vat-numbers-and-vat-in-other-languages
	 */
	private static $euCountries = [
		'AT',
		'BE',
		'BG',
		'HR',
		'CY',
		'CZ',
		'DK',
		'EE',
		'FI',
		'FR',
		'DE',
		'EL',
		'HU',
		'IE',
		'IT',
		'LV',
		'LT',
		'LU',
		'MT',
		'NL',
		'PL',
		'PT',
		'RO',
		'SK',
		'SI',
		'ES',
		'SE',
	];

	/** @var string */
	private $title;
	/** @var string */
	private $code;



	/**
	 * @param string $code
	 * @param string $title
	 */
	private function __construct(string $code, string $title)
	{
		$this->code = $code;
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getTitleEn(): string
	{
		return ucwords(str_replace('_', ' ', $this->title));
	}

	/**
	 * @return bool
	 */
	public function isEuCountry(): bool
	{
		return in_array($this->code, self::$euCountries);
	}

	/**
	 * @param Country $country
	 * @return bool
	 */
	public function equals(Country $country)
	{
		return $this->code === $country->getCode();
	}

	/**
	 * @return CountryProxy
	 */
	public function toProxy(): CountryProxy
	{
		return ProxyConverter::convert($this, CountryProxy::class);
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->getTitle();
	}

	/**
	 * @param string $code
	 * @return Country
	 * @throws \InvalidArgumentException If country code does not exist
	 */
	public static function from(string $code): Country
	{
		$code = strtoupper($code);
		if (!isset(self::$countries[$code])) {
			throw new \InvalidArgumentException(sprintf('Unknown country "%s"', $code));
		}

		return new self($code, self::$countries[$code]);
	}

	/**
	 * @param string $code
	 * @return bool
	 */
	public static function isCountry(string $code): bool
	{
		$code = strtoupper($code);
		return isset(self::$countries[$code]);
	}

	/**
	 * @return array
	 */
	public static function getCountries(): array
	{
		return self::$countries;
	}

	/**
	 * @return array
	 */
	public static function getEuCountries(): array
	{
		return self::$euCountries;
	}
}