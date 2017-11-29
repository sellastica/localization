<?php
namespace Sellastica\Localization\Presentation;

use Sellastica\Twig\Model\ProxyObject;

/**
 * {@inheritdoc}
 * @property \Sellastica\Localization\Model\Country $parent
 */
class CountryProxy extends ProxyObject
{
	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->parent->getTitle();
	}

	/**
	 * @return string
	 */
	public function getTitleEn()
	{
		return $this->parent->getTitleEn();
	}

	/**
	 * @return mixed
	 */
	public function getCode()
	{
		return $this->parent->getCode();
	}

	/**
	 * @return string
	 */
	public function getShortName()
	{
		return 'country';
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->getTitle();
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties()
	{
		return [
			'title',
			'code',
		];
	}
}