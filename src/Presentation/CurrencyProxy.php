<?php
namespace Sellastica\Localization\Presentation;

use Sellastica\Twig\Model\ProxyEntity;

/**
 * {@inheritdoc}
 * @property \Sellastica\Localization\Model\Currency $parent
 */
class CurrencyProxy extends ProxyEntity
{
	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->parent->getCode();
	}

	/**
	 * @return string
	 */
	public function getSymbol()
	{
		return $this->parent->getSymbol();
	}

	/**
	 * @param float $number
	 * @param bool $trimIntegers
	 * @param bool $symbol
	 * @return string
	 */
	public function format($number, $trimIntegers = TRUE, $symbol = TRUE)
	{
		return $this->parent->format($number, $trimIntegers, $symbol);
	}

	/**
	 * @return string
	 */
	public function getShortName(): string
	{
		return $this->parent->getCode();
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties()
	{
		return [
			'code',
			'symbol',
		];
	}
}