<?php
namespace Sellastica\Localization\Model;

/**
 * Language list by ISO 639-1
 * Date and time format by ISO 8601
 * @see https://en.wikipedia.org/wiki/Date_format_by_country
 */
class Localization implements \Sellastica\Twig\Model\IProxable
{
	/** @var array */
	private static $localizations = [
		//Czech
		'cs_CZ' => [
			'language' => 'cs',
			'date_format' => 'j.n.Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.cs_cz',
			'language_title' => 'system.localizations.languages.cs',
		],
		//English
		'en_US' => [
			'language' => 'en',
			'date_format' => 'n/j/Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.en_us',
			'language_title' => 'system.localizations.languages.en',
		],
		//Estonian
		'et_EE' => [
			'language' => 'et',
			'date_format' => 'j.n.Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.et_ee',
			'language_title' => 'system.localizations.languages.et',
		],
		//French
		'fr_FR' => [
			'language' => 'fr',
			'date_format' => 'j/n/Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.fr_fr',
			'language_title' => 'system.localizations.languages.fr',
		],
		//Croatian
		'hr_HR' => [
			'language' => 'hr',
			'date_format' => 'n/j/Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.hr_hr',
			'language_title' => 'system.localizations.languages.hr',
		],
		//Hungarian
		'hu_HU' => [
			'language' => 'hu',
			'date_format' => 'Y.n.j',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.hu_hu',
			'language_title' => 'system.localizations.languages.hu',
		],
		//Lithuanian
		'lt_LT' => [
			'language' => 'lt',
			'date_format' => 'j.n.Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.lt_lt',
			'language_title' => 'system.localizations.languages.lt',
		],
		//Russian
		'ru_RU' => [
			'language' => 'ru',
			'date_format' => 'j.n.Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.ru_ru',
			'language_title' => 'system.localizations.languages.ru',
		],
		//Slovak
		'sk_SK' => [
			'language' => 'sk',
			'date_format' => 'j.n.Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.sk_sk',
			'language_title' => 'system.localizations.languages.sk',
		],
		//Slovenian
		'sl_SI' => [
			'language' => 'sl',
			'date_format' => 'j.n.Y',
			'time_format' => 'G:i',
			'time_format_with_seconds' => 'G:i:s',
			'title' => 'system.localizations.sl_si',
			'language_title' => 'system.localizations.languages.sl',
		],
	];
	/** @var array */
	private static $languages = [
		'cs' => 'cs_CZ',
		'en' => 'en_US',
		'et' => 'et_EE',
		'fr' => 'fr_FR',
		'hr' => 'hr_HR',
		'hu' => 'hu_HU',
		'lt' => 'lt_LT',
		'ru' => 'ru_RU',
		'sk' => 'sk_SK',
		'sl' => 'sl_SI',
	];

	/** @var string */
	private $code;
	/** @var string */
	private $language;
	/** @var string */
	private $dateFormat;
	/** @var string */
	private $timeFormat;
	/** @var string */
	private $timeFormatWithSeconds;
	/** @var string */
	private $title;
	/** @var string */
	private $languageTitle;


	/**
	 * @param string $code
	 * @param string $language
	 * @param string $dateFormat
	 * @param string $timeFormat
	 * @param string $timeFormatWithSeconds
	 * @param string $title
	 * @param string $languageTitle
	 */
	private function __construct(
		string $code,
		string $language,
		string $dateFormat,
		string $timeFormat,
		string $timeFormatWithSeconds,
		string $title,
		string $languageTitle
	)
	{
		$this->code = $code;
		$this->language = $language;
		$this->dateFormat = $dateFormat;
		$this->timeFormat = $timeFormat;
		$this->timeFormatWithSeconds = $timeFormatWithSeconds;
		$this->title = $title;
		$this->languageTitle = $languageTitle;
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
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * @return string
	 */
	public function getLanguageTitle(): string
	{
		return $this->languageTitle;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getDateFormat(): string
	{
		return $this->dateFormat;
	}

	/**
	 * @return string
	 */
	public function getTimeFormat(): string
	{
		return $this->timeFormat;
	}

	/**
	 * @return string
	 */
	public function getTimeFormatWithSeconds(): string
	{
		return $this->timeFormatWithSeconds;
	}

	/**
	 * @return string
	 */
	public function getDateTimeFormat(): string
	{
		return $this->dateFormat . ' ' . $this->timeFormat;
	}

	/**
	 * @return string
	 */
	public function getDateTimeFormatWithSeconds(): string
	{
		return $this->dateFormat . ' ' . $this->timeFormatWithSeconds;
	}

	/**
	 * @param Localization $localization
	 * @return bool
	 */
	public function equals(Localization $localization): bool
	{
		return $localization->getCode() === $this->code;
	}

	/**
	 * @return \Sellastica\Localization\Presentation\LocalizationProxy
	 */
	public function toProxy(): \Sellastica\Localization\Presentation\LocalizationProxy
	{
		return \Sellastica\Twig\Model\ProxyConverter::convert(
			$this, \Sellastica\Localization\Presentation\LocalizationProxy::class
		);
	}

	/**
	 * @param string $code
	 * @return Localization
	 * @throws \InvalidArgumentException
	 */
	public static function from(string $code): Localization
	{
		if (!self::isLocalization($code)) {
			throw new \InvalidArgumentException(sprintf('Unknown localization "%s"', $code));
		}

		$localization = self::$localizations[$code];
		return new self(
			$code,
			$localization['language'],
			$localization['date_format'],
			$localization['time_format'],
			$localization['time_format_with_seconds'],
			$localization['title'],
			$localization['language_title']
		);
	}

	/**
	 * @param string $code
	 * @return bool
	 */
	public static function isLocalization(string $code): bool
	{
		return isset(self::$localizations[$code]);
	}

	/**
	 * @param string $language
	 * @return Localization
	 * @throws \InvalidArgumentException
	 */
	public static function fromLanguage(string $language): Localization
	{
		if (!self::isLanguage($language)) {
			throw new \InvalidArgumentException(sprintf('Unknown language "%s"', $language));
		}

		return self::from(self::$languages[$language]);
	}

	/**
	 * @param string $language
	 * @return bool
	 */
	public static function isLanguage(string $language): bool
	{
		return isset(self::$languages[$language]);
	}

	/**
	 * @return Localization[]
	 */
	public static function getAll(): array
	{
		$return = [];
		foreach (self::$localizations as $localization => $data) {
			$return[] = self::from($localization);
		}

		return $return;
	}
}