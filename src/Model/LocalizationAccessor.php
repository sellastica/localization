<?php
namespace Sellastica\Localization\Model;

use Nette;
use Sellastica\Core\Model\FactoryAccessor;
use Sellastica\Project\Model\ProjectAccessor;

/**
 * @method Localization get()
 */
class LocalizationAccessor extends FactoryAccessor
{
	/** @var ProjectAccessor */
	private $projectAccessor;
	/** @var Nette\Application\IRouter */
	private $router;
	/** @var Nette\Http\IRequest */
	private $httpRequest;


	/**
	 * @param ProjectAccessor $projectAccessor
	 * @param Nette\Application\IRouter $router
	 * @param Nette\Http\IRequest $httpRequest
	 */
	public function __construct(
		ProjectAccessor $projectAccessor,
		Nette\Application\IRouter $router,
		Nette\Http\IRequest $httpRequest
	)
	{
		$this->projectAccessor = $projectAccessor;
		$this->router = $router;
		$this->httpRequest = $httpRequest;
	}

	/**
	 * @return \Sellastica\Localization\Model\Localization
	 */
	public function getDefault(): Localization
	{
		return $this->projectAccessor->get()->getLocalization();
	}

	/**
	 * @param string $language
	 * @return bool
	 */
	public function isDefaultLanguage(string $language): bool
	{
		return $language === $this->getDefault()->getLanguage();
	}

	/**
	 * @return Localization
	 */
	public function create(): Localization
	{
		if (!$appRequest = $this->router->match($this->httpRequest)) {
			return $this->getDefault();
		}

		if ($language = $appRequest->getParameter('locale')) {
			return Localization::fromLanguage($language);
		}

		return $this->getDefault();
	}
}