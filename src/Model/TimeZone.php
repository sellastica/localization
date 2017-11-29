<?php
namespace Sellastica\Localization\Model;

class TimeZone
{
	/** @var array */
	private static $timezones = [
		'Africa/Algiers' => '(GMT+01:00) West Central Africa',
		'Africa/Cairo' => '(GMT+02:00) Cairo',
		'Africa/Casablanca' => '(GMT) Casablanca',
		'Africa/Harare' => '(GMT+02:00) Harare',
		'Africa/Monrovia' => '(GMT) Monrovia',
		'Africa/Nairobi' => '(GMT+03:00) Nairobi',
		'Africa/Windhoek' => '(GMT+02:00) Windhoek',
		'America/Anchorage' => '(GMT-09:00) Alaska',
		'America/Argentina/Buenos_Aires' => '(GMT-03:00) Georgetown',
		'America/Bogota' => '(GMT-05:00) Bogota',
		'America/Caracas' => '(GMT-04:30) Caracas',
		'America/Denver' => '(GMT-07:00) Mountain Time (US & Canada)',
		'America/Godthab' => '(GMT-03:00) Greenland',
		'America/Halifax' => '(GMT-04:00) Atlantic Time (Canada)',
		'America/Chicago' => '(GMT-06:00) Central Time (US & Canada)',
		'America/Chihuahua' => '(GMT-07:00) Chihuahua',
		'America/Indiana/Indianapolis' => '(GMT-05:00) Indiana (East)',
		'America/La_Paz' => '(GMT-04:00) La Paz',
		'America/Lima' => '(GMT-05:00) Lima',
		'America/Los_Angeles' => '(GMT-08:00) Pacific Time (US & Canada)',
		'America/Manaus' => '(GMT-04:00) Manaus',
		'America/Mazatlan' => '(GMT-07:00) Mazatlan',
		'America/Mexico_City' => '(GMT-06:00) Mexico City',
		'America/Monterrey' => '(GMT-06:00) Monterrey',
		'America/Montevideo' => '(GMT-03:00) Montevideo',
		'America/New_York' => '(GMT-05:00) Eastern Time (US & Canada)',
		'America/Phoenix' => '(GMT-07:00) Arizona',
		'America/Regina' => '(GMT-06:00) Saskatchewan',
		'America/Rio_Branco' => '(GMT-05:00) Rio Branco',
		'America/Santiago' => '(GMT-04:00) Santiago',
		'America/Sao_Paulo' => '(GMT-03:00) Brasilia',
		'America/St_Johns' => '(GMT-03:30) Newfoundland',
		'America/Tegucigalpa' => '(GMT-06:00) Central America',
		'America/Tijuana' => '(GMT-08:00) Tijuana, Baja California',
		'Asia/Almaty' => '(GMT+06:00) Almaty',
		'Asia/Amman' => '(GMT+02:00) Amman',
		'Asia/Baghdad' => '(GMT+03:00) Baghdad',
		'Asia/Baku' => '(GMT+04:00) Baku',
		'Asia/Bangkok' => '(GMT+07:00) Bangkok',
		'Asia/Beirut' => '(GMT+02:00) Beirut',
		'Asia/Brunei' => '(GMT+08:00) Beijing',
		'Asia/Colombo' => '(GMT+05:30) Sri Jayawardenepura',
		'Asia/Dhaka' => '(GMT+06:00) Dhaka',
		'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
		'Asia/Chongqing' => '(GMT+08:00) Chongqing',
		'Asia/Irkutsk' => '(GMT+08:00) Irkutsk',
		'Asia/Jakarta' => '(GMT+07:00) Jakarta',
		'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
		'Asia/Kamchatka' => '(GMT+12:00) Kamchatka',
		'Asia/Karachi' => '(GMT+05:00) Karachi',
		'Asia/Katmandu' => '(GMT+05:45) Kathmandu',
		'Asia/Kolkata' => '(GMT+05:30) Calcutta',
		'Asia/Krasnoyarsk' => '(GMT+07:00) Krasnoyarsk',
		'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
		'Asia/Kuwait' => '(GMT+03:00) Kuwait',
		'Asia/Magadan' => '(GMT+11:00) Magadan',
		'Asia/Muscat' => '(GMT+04:00) Muscat',
		'Asia/Novosibirsk' => '(GMT+06:00) Novosibirsk',
		'Asia/Rangoon' => '(GMT+06:30) Yangon (Rangoon)',
		'Asia/Riyadh' => '(GMT+03:00) Riyadh',
		'Asia/Seoul' => '(GMT+09:00) Seoul',
		'Asia/Singapore' => '(GMT+08:00) Singapore',
		'Asia/Taipei' => '(GMT+08:00) Taipei',
		'Asia/Tashkent' => '(GMT+05:00) Tashkent',
		'Asia/Tbilisi' => '(GMT+03:00) Tbilisi',
		'Asia/Tehran' => '(GMT+03:30) Tehran',
		'Asia/Tokyo' => '(GMT+09:00) Tokyo',
		'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
		'Asia/Urumqi' => '(GMT+08:00) Urumqi',
		'Asia/Vladivostok' => '(GMT+10:00) Vladivostok',
		'Asia/Yakutsk' => '(GMT+09:00) Yakutsk',
		'Asia/Yekaterinburg' => '(GMT+05:00) Ekaterinburg',
		'Asia/Yerevan' => '(GMT+04:00) Yerevan',
		'Atlantic/Azores' => '(GMT-01:00) Azores',
		'Atlantic/Cape_Verde' => '(GMT-01:00) Cape Verde Is.',
		'Atlantic/Reykjavik' => '(GMT) Reykjavik',
		'Atlantic/South_Georgia' => '(GMT-02:00) Mid-Atlantic',
		'Australia/Adelaide' => '(GMT+09:30) Adelaide',
		'Australia/Brisbane' => '(GMT+10:00) Brisbane',
		'Australia/Canberra' => '(GMT+10:00) Canberra',
		'Australia/Darwin' => '(GMT+09:30) Darwin',
		'Australia/Hobart' => '(GMT+10:00) Hobart',
		'Australia/Melbourne' => '(GMT+10:00) Melbourne',
		'Australia/Perth' => '(GMT+08:00) Perth',
		'Australia/Sydney' => '(GMT+10:00) Sydney',
		'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
		'Europe/Athens' => '(GMT+02:00) Athens',
		'Europe/Belgrade' => '(GMT+01:00) Belgrade',
		'Europe/Berlin' => '(GMT+01:00) Berlin',
		'Europe/Bratislava' => '(GMT+01:00) Bratislava',
		'Europe/Brussels' => '(GMT+01:00) Brussels',
		'Europe/Budapest' => '(GMT+01:00) Budapest',
		'Europe/Bucharest' => '(GMT+02:00) Bucharest',
		'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
		'Europe/Dublin' => '(GMT) Dublin',
		'Europe/Helsinki' => '(GMT+02:00) Helsinki',
		'Europe/Istanbul' => '(GMT+02:00) Istanbul',
		'Europe/Lisbon' => '(GMT) Lisbon',
		'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
		'Europe/London' => '(GMT) London',
		'Europe/Madrid' => '(GMT+01:00) Madrid',
		'Europe/Minsk' => '(GMT+02:00) Minsk',
		'Europe/Moscow' => '(GMT+03:00) Moscow',
		'Europe/Paris' => '(GMT+01:00) Paris',
		'Europe/Prague' => '(GMT+01:00) Prague',
		'Europe/Riga' => '(GMT+02:00) Riga',
		'Europe/Rome' => '(GMT+01:00) Rome',
		'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
		'Europe/Skopje' => '(GMT+01:00) Skopje',
		'Europe/Sofia' => '(GMT+02:00) Sofia',
		'Europe/Stockholm' => '(GMT+01:00) Stockholm',
		'Europe/Tallinn' => '(GMT+02:00) Tallinn',
		'Europe/Vienna' => '(GMT+01:00) Vienna',
		'Europe/Vilnius' => '(GMT+02:00) Vilnius',
		'Europe/Volgograd' => '(GMT+03:00) Volgograd',
		'Europe/Warsaw' => '(GMT+01:00) Warsaw',
		'Europe/Zagreb' => '(GMT+01:00) Zagreb',
		'Kwajalein' => '(GMT-12:00) International Date Line West',
		'Pacific/Auckland' => '(GMT+12:00) Auckland',
		'Pacific/Fiji' => '(GMT+12:00) Fiji',
		'Pacific/Guam' => '(GMT+10:00) Guam',
		'Pacific/Honolulu' => '(GMT-10:00) Hawaii',
		'Pacific/Midway' => '(GMT-11:00) Midway Island',
		'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
		'Pacific/Samoa' => '(GMT-11:00) Samoa',
		'Pacific/Tongatapu' => '(GMT+13:00) Nukualofa',
	];

	/** @var string */
	private $title;
	/** @var string */
	private $description;

	/**
	 * @param string $title
	 * @param string $description
	 */
	public function __construct(string $title, string $description)
	{
		$this->title = $title;
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $code
	 * @return TimeZone
	 * @throws \InvalidArgumentException
	 */
	public static function from(string $code)
	{
		if (!isset(self::$timezones[$code])) {
			throw new \InvalidArgumentException(sprintf('Unknown localization "%s"', $code));
		}

		$timezone = self::$timezones[$code];
		return new self($code, $timezone);
	}

	/**
	 * @return array
	 */
	public static function getAll(): array
	{
		return self::$timezones;
	}
}