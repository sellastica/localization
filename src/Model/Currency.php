<?php
namespace Sellastica\Localization\Model;

use Sellastica\Localization\Presentation\CurrencyProxy;
use Sellastica\Twig\Model\IProxable;
use Sellastica\Twig\Model\ProxyConverter;
use Sellastica\Utils\Strings;

class Currency implements IProxable
{
	/** @var array */
	private static $currencies = [
		'CZK' => [
			'numeric_code' => 203,
			'display_name' => 'Česká Koruna',
			'symbol' => 'Kč',
			'sub_unit' => 100,
			'fraction_digits' => 2,
			'fraction_digits_separator' => ',',
			'thousands_separator' => ' ',
			'symbol_left' => false,
			'symbol_space' => true,
		],
		'EUR' => [
			'numeric_code' => 978,
			'display_name' => 'Euro',
			'symbol' => '€',
			'sub_unit' => 100,
			'fraction_digits' => 2,
			'fraction_digits_separator' => ',',
			'thousands_separator' => ' ',
			'symbol_left' => true,
			'symbol_space' => true,
		],
		'GBP' => [
			'numeric_code' => 826,
			'display_name' => 'British Pound',
			'symbol' => '£',
			'sub_unit' => 100,
			'fraction_digits' => 2,
			'fraction_digits_separator' => ',',
			'thousands_separator' => ' ',
			'symbol_left' => true,
			'symbol_space' => true,
		],
		'HRK' => [
			'numeric_code' => 978,
			'display_name' => 'Kuna',
			'symbol' => 'kn',
			'sub_unit' => 100,
			'fraction_digits' => 2,
			'fraction_digits_separator' => '.',
			'thousands_separator' => ' ',
			'symbol_left' => false,
			'symbol_space' => true,
		],
		'HUF' => [
			'numeric_code' => 978,
			'display_name' => 'Forint',
			'symbol' => 'Ft',
			'sub_unit' => 100,
			'fraction_digits' => 2,
			'fraction_digits_separator' => ',',
			'thousands_separator' => '.',
			'symbol_left' => false,
			'symbol_space' => true,
		],
		'PLN' => [
			'numeric_code' => 978,
			'display_name' => 'Złoty',
			'symbol' => 'zł',
			'sub_unit' => 100,
			'fraction_digits' => 2,
			'fraction_digits_separator' => ',',
			'thousands_separator' => '.',
			'symbol_left' => false,
			'symbol_space' => true,
		],
		'USD' => [
			'numeric_code' => 840,
			'display_name' => 'US Dollar',
			'symbol' => '$',
			'sub_unit' => 100,
			'fraction_digits' => 2,
			'fraction_digits_separator' => ',',
			'thousands_separator' => ' ',
			'symbol_left' => true,
			'symbol_space' => true,
		],
	];

	/** @var string */
	private $code;
	/** @var int */
	private $numericCode;
	/** @var string */
	private $displayName;
	/** @var string */
	private $symbol;
	/** @var int */
	private $subUnit;
	/** @var int */
	private $fractionDigits;
	/** @var int */
	private $symbolLeft;
	/** @var int Space between price and symbol? */
	private $symbolSpace;
	/** @var string */
	private $fractionDigitsSeparator;
	/** @var string */
	private $thousandsSeparator;

	/**
	 * @param string $code
	 * @param int $numericCode
	 * @param string $displayName
	 * @param string $symbol
	 * @param int $subUnit
	 * @param int $fractionDigits
	 * @param bool $symbolLeft
	 * @param bool $symbolSpace
	 * @param string $fractionDigitsSeparator
	 * @param string $thousandsSeparator
	 */
	private function __construct(
		string $code,
		int $numericCode,
		string $displayName,
		string $symbol,
		int $subUnit,
		int $fractionDigits,
		bool $symbolLeft,
		bool $symbolSpace,
		string $fractionDigitsSeparator,
		string $thousandsSeparator
	)
	{
		$this->code = $code;
		$this->symbol = $symbol;
		$this->fractionDigits = $fractionDigits;
		$this->symbolLeft = $symbolLeft;
		$this->symbolSpace = $symbolSpace;
		$this->fractionDigitsSeparator = $fractionDigitsSeparator;
		$this->thousandsSeparator = $thousandsSeparator;
		$this->displayName = $displayName;
		$this->numericCode = $numericCode;
		$this->subUnit = $subUnit;
	}

	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return int
	 */
	public function getNumericCode()
	{
		return $this->numericCode;
	}

	/**
	 * @return string
	 */
	public function getDisplayName()
	{
		return $this->displayName;
	}

	/**
	 * @return string
	 */
	public function getSymbol()
	{
		return $this->symbol;
	}

	/**
	 * @return int
	 */
	public function getSubUnit()
	{
		return $this->subUnit;
	}

	/**
	 * @return int
	 */
	public function getFractionDigits()
	{
		return $this->fractionDigits;
	}

	/**
	 * @return int
	 */
	public function hasSymbolLeft()
	{
		return $this->symbolLeft;
	}

	/**
	 * @return int
	 */
	public function hasSymbolSpace()
	{
		return $this->symbolSpace;
	}

	/**
	 * @return string
	 */
	public function getFractionDigitsSeparator()
	{
		return $this->fractionDigitsSeparator;
	}

	/**
	 * @return string
	 */
	public function getThousandsSeparator()
	{
		return $this->thousandsSeparator;
	}

	/**
	 * @param float $number
	 * @param bool $trimIntegers
	 * @param bool $symbol Display incl. symbol
	 * @return string E.g. 1 000 Kč, €250, 123,20 Kč
	 */
	public function format($number, $trimIntegers = true, $symbol = true)
	{
		if (!is_numeric($number)) {
			$number = Strings::floatify($number);
		}

		$fractionDigits = (true === $trimIntegers) && (round($number) === $number) ? 0 : $this->fractionDigits;
		$formattedNumber = number_format(
			$number,
			$fractionDigits,
			$this->fractionDigitsSeparator,
			$this->thousandsSeparator
		);

		if (true === $symbol) {
			$formattedPrice = $this->symbolLeft
				? $this->symbol . ($this->symbolSpace ? ' ' : '') . $formattedNumber
				: $formattedNumber . ($this->symbolSpace ? ' ' : '') . $this->symbol;
		} else {
			$formattedPrice = $formattedNumber;
		}

		return $formattedPrice;
	}

	/**
	 * Number formatting by ISO 4217
	 * @param $number
	 * @param bool $symbol
	 * @return string e.g. 1000.00 CZK, 250.12 EUR, 123.00
	 */
	public function formatByIso($number, $symbol = true)
	{
		if (!is_numeric($number)) {
			$number = Strings::floatify($number);
		}

		$formattedNumber = number_format(
			$number,
			$this->fractionDigits,
			'.',
			''
		);
		return $symbol
			? $formattedNumber . ' ' . $this->code
			: $formattedNumber;
	}

	/**
	 * @param float $price
	 * @return float
	 */
	public function round(float $price): float
	{
		return round($price, $this->fractionDigits);
	}

	/**
	 * @param Currency $currency
	 * @return bool
	 */
	public function equals(Currency $currency)
	{
		return $this->code === $currency->getCode();
	}

	/**
	 * @return Currency
	 */
	public static function eur(): Currency
	{
		return self::from('EUR');
	}

	/**
	 * @return bool
	 */
	public function isEur(): bool
	{
		return $this->code === 'EUR';
	}

	/**
	 * @return bool
	 */
	public function isCzk(): bool
	{
		return $this->code === 'CZK';
	}

	/**
	 * @return Currency
	 */
	public static function czk(): Currency
	{
		return self::from('CZK');
	}

	/**
	 * @param string $code
	 * @return Currency
	 * @throws \InvalidArgumentException
	 */
	public static function from(string $code)
	{
		$code = strtoupper($code);
		if (!array_key_exists($code, self::$currencies)) {
			throw new \InvalidArgumentException(sprintf('Unknown currency %s', $code));
		}

		$currency = self::$currencies[$code];
		return new self(
			$code,
			$currency['numeric_code'],
			$currency['display_name'],
			$currency['symbol'],
			$currency['sub_unit'],
			$currency['fraction_digits'],
			$currency['symbol_left'],
			$currency['symbol_space'],
			$currency['fraction_digits_separator'],
			$currency['thousands_separator']
		);
	}

	/**
	 * @param string $code
	 * @return bool
	 */
	public static function is(string $code): bool
	{
		return array_key_exists($code, self::$currencies);
	}

	/**
	 * @param string $code
	 * @return bool
	 */
	public static function exists(string $code): bool
	{
		return isset(self::$currencies[$code]);
	}

	/**
	 * @return Currency[]
	 */
	public static function getAll(): array
	{
		$currencies = [];
		foreach (self::$currencies as $code => $currency) {
			$currencies[$code] = self::from($code);
		}

		return $currencies;
	}

	/**
	 * @return \Sellastica\Localization\Presentation\CurrencyProxy
	 */
	public function toProxy(): CurrencyProxy
	{
		return ProxyConverter::convert($this, CurrencyProxy::class);
	}
}