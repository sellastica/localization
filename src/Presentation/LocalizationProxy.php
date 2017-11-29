<?php
namespace Sellastica\Localization\Presentation;

use Sellastica\Twig\Model\ProxyEntity;

/**
 * {@inheritdoc}
 * @property \Sellastica\Localization\Model\Localization $parent
 */
class LocalizationProxy extends ProxyEntity
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
	public function getLanguage()
	{
		return $this->parent->getLanguage();
	}

	/**
	 * @return string
	 */
	public function getDate_format()
	{
		return $this->parent->getDateFormat();
	}

	/**
	 * @return string
	 */
	public function getTime_format()
	{
		return $this->parent->getTimeFormat();
	}

	/**
	 * @return string
	 */
	public function getTime_format_with_seconds()
	{
		return $this->parent->getTimeFormatWithSeconds();
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
			'id',
			'code',
			'language',
			'date_format',
			'time_format',
			'time_format_with_seconds',
		];
	}
}