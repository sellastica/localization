<?php
namespace Sellastica\Localization\Service;

class CountryService
{
	/** @var \Nette\Localization\ITranslator */
	private $translator;


	/**
	 * @param \Nette\Localization\ITranslator $translator
	 */
	public function __construct(\Nette\Localization\ITranslator $translator)
	{
		$this->translator = $translator;
	}

	/**
	 * @return array
	 */
	public function getPairs(): array
	{
		$pairs = [];
		foreach (\Sellastica\Localization\Model\Country::getCountries() as $countryCode => $titleEn) {
			$country = \Sellastica\Localization\Model\Country::from($countryCode);
			$pairs[$countryCode] = $this->translator->translate($country->getTitle());
		}

		asort($pairs, SORT_LOCALE_STRING);
		return $pairs;
	}
}