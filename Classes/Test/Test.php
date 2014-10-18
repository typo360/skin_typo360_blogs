<?php
namespace EXL\SkinTypo360Blogs\Test;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 EXL GROUP <typo360@exl-group.com>
 *  Based on extension by Georg Ringer
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class Test extends \TYPO3\CMS\Frontend\ContentObject\FluidTemplateContentObject {
	/**
	 * Constructor
	 */
	public function __construct() {
		DebuggerUtility::var_dump($this);
		/** @var $contentObjectRenderer \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer */
//		$contentObjectRenderer = GeneralUtility::makeInstance('\\TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer');
//		parent::__construct($this->cObj);
	}

	public function test() {
//		/** @var $objectManager \TYPO3\CMS\Extbase\Object\ObjectManager */
//		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
//		/** @var $configurationManager \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface */
//		$configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
//		/** @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $contentObject */
//		$contentObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer');
//
//		/** @var $template \TYPO3\CMS\Fluid\View\TemplateView */
//		$template = GeneralUtility::makeInstance('\\TYPO3\\CMS\\Fluid\\View\\TemplateView');
//
//		$configurationManager->setContentObject($contentObject);
//
////		$this->templateParser = $objectManager->get('TYPO3\\CMS\\Fluid\\Core\\Parser\\TemplateParser');
//		$template->setRenderingContext($objectManager->get('TYPO3\\CMS\\Fluid\\Core\\Rendering\\RenderingContext'));
//		/** @var $request \TYPO3\CMS\Extbase\Mvc\Web\Request */
//		$request = $objectManager->get('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Request');
//		$request->setRequestURI(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'));
//		$request->setBaseURI(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL'));
//		$request->setControllerExtensionName('skin_typo360_blogs');
//		$uriBuilder = $objectManager->get('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder');
//		$uriBuilder->setRequest($request);
//		$controllerContext = $objectManager->get('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerContext');
//		$controllerContext->setRequest($request);
//		$controllerContext->setUriBuilder($uriBuilder);
//		$template->setControllerContext($controllerContext);
//		$this->templateCompiler = $objectManager->get('TYPO3\\CMS\\Fluid\\Core\\Compiler\\TemplateCompiler');
//		// singleton
//		$this->templateCompiler->setTemplateCache(\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager')->getCache('fluid_template'));
//		$template->injectTemplateCompiler($this->templateCompiler);

		DebuggerUtility::var_dump($this);
		/** @var $template \TYPO3\CMS\Fluid\View\TemplateView */
//		$template = GeneralUtility::makeInstance('\\TYPO3\\CMS\\Fluid\\View\\TemplateView');

		$this->setTemplatePathAndFilename('EXT:skin_typo360_blogs/Resources/Private/Templates/');
		$path = GeneralUtility::getFileAbsFileName('EXT:skin_typo360_blogs/Resources/Private/Templates/Templates/Default.html');
		$this->setTemplatePathAndFilename($path);
//		$this->setLayoutRootPath(array(
//			'EXT:skin_typo360_blogs/Resources/Private/Templates/Layout/',
//			'EXT:skin_romaincanon/Resources/Private/Templates/Layout/'
//		));
		$path = GeneralUtility::getFileAbsFileName('EXT:skin_typo360_blogs/Resources/Private/Templates/Layout/');
		$this->setLayoutRootPath($path);
		$this->setPartialRootPath(array(
			'EXT:skin_romaincanon/Resources/Private/Templates/Partials/',
			'EXT:skin_typo360_blogs/Resources/Private/Templates/Partials/',
		));

		/** @var $controllerContext \TYPO3\CMS\Extbase\Mvc\Controller\ControllerContext */
//		$controllerContext = GeneralUtility::makeInstance('\\TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerContext');
//		$template->setControllerContext($controllerContext);

		return $this->render();
	}

	protected function getLayoutPathAndFilename($layoutName = 'Default') {
		$layoutRootPath = $this->getLayoutRootPath();
//		if (!is_dir($layoutRootPath)) {
//			throw new \TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException('Layout root path "' . $layoutRootPath . '" does not exist.', 1288092521);
//		}

		if (!is_array($layoutRootPath)) {
			$layoutRootPath = array($layoutRootPath);
		}

		$possibleLayoutPaths = array();
		foreach($layoutRootPath as $path) {
			$possibleLayoutPaths[] = \TYPO3\CMS\Core\Utility\GeneralUtility::fixWindowsFilePath($path . '/' . $layoutName . '.' . $this->getRequest()->getFormat());
			$possibleLayoutPaths[] = \TYPO3\CMS\Core\Utility\GeneralUtility::fixWindowsFilePath($path . '/' . $layoutName);
		}

		foreach ($possibleLayoutPaths as $layoutPathAndFilename) {
			if (is_file($layoutPathAndFilename)) {
				return $layoutPathAndFilename;
			}
		}

		throw new \TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException('Could not load layout file. Tried following paths: "' . implode('", "', $possibleLayoutPaths) . '".', 1288092555);
	}

	/**
	 * Returns the absolute path to the folder that contains Fluid partial files
	 *
	 * @return string Fluid partial root path
	 * @api
	 */
	public function getPartialRootPath() {
		die('test');
		if ($this->partialRootPath === NULL && $this->templatePathAndFilename === NULL) {
			throw new \TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException('No partial root path has been specified. Use setPartialRootPath().', 1288094511);
		}
		if ($this->partialRootPath === NULL) {
			$this->partialRootPath = dirname($this->templatePathAndFilename) . '/Partials';
		}
		return $this->partialRootPath;
	}
}