<?php
namespace EXL\SkinTypo360Blogs\Xclass;

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

class FluidTemplateContentObject extends \TYPO3\CMS\Frontend\ContentObject\FluidTemplateContentObject {
	
	/**
	 * Set layout root path if given in configuration
	 *
	 * @param array $conf Configuration array
	 * @return void
	 */
	protected function setLayoutRootPath(array $conf) {
		if (!isset($conf['layoutRootPath.']) || isset($conf['layoutRootPath.']['wrap'])) {
			$layoutRootPath = isset($conf['layoutRootPath.']) ? $this->cObj->stdWrap($conf['layoutRootPath'], $conf['layoutRootPath.']) : $conf['layoutRootPath'];
			if ($layoutRootPath) {
				$absLayoutRootPath = GeneralUtility::getFileAbsFileName($layoutRootPath);
				if ($absLayoutRootPath == '') $absLayoutRootPath = $layoutRootPath;
				$this->view->setLayoutRootPath($absLayoutRootPath);
			}
		}
		else {
			/** @var  $typoScriptService \TYPO3\CMS\Extbase\Service\TypoScriptService */
			$typoScriptService = GeneralUtility::makeInstance('\\TYPO3\\CMS\\Extbase\\Service\\TypoScriptService');

			$plainConf = $typoScriptService->convertTypoScriptArrayToPlainArray($conf);

			$layoutRootPaths = array();
			foreach(array_keys($plainConf['layoutRootPath']) as $key) {
				$layoutRootPath = isset($conf['layoutRootPath.'][$key . '.']) ? $this->cObj->stdWrap($conf['layoutRootPath.'][$key], $conf['layoutRootPath.'][$key . '.']) : $conf['layoutRootPath.'][$key];

				if ($layoutRootPath) {
					$absLayoutRootPath = GeneralUtility::getFileAbsFileName($layoutRootPath);
					if ($absLayoutRootPath == '') $absLayoutRootPath = $layoutRootPath;
					$layoutRootPaths[] = $absLayoutRootPath;
				}
			}

			$this->view->setLayoutRootPath($layoutRootPaths);
		}
	}

	/**
	 * Set partial root path if given in configuration
	 *
	 * @param array $conf Configuration array
	 * @return void
	 */
	protected function setPartialRootPath(array $conf) {
		if (!isset($conf['partialRootPath.']) || isset($conf['partialRootPath.']['wrap'])) {
			$partialRootPath = isset($conf['partialRootPath.']) ? $this->cObj->stdWrap($conf['partialRootPath'], $conf['partialRootPath.']) : $conf['partialRootPath'];
			if ($partialRootPath) {
				$absPartialRootPath = GeneralUtility::getFileAbsFileName($partialRootPath);
				if ($absPartialRootPath == '') $absPartialRootPath = $partialRootPath;
				$this->view->setPartialRootPath($absPartialRootPath);
			}
		}
		else {
			/** @var  $typoScriptService \TYPO3\CMS\Extbase\Service\TypoScriptService */
			$typoScriptService = GeneralUtility::makeInstance('\\TYPO3\\CMS\\Extbase\\Service\\TypoScriptService');

			$plainConf = $typoScriptService->convertTypoScriptArrayToPlainArray($conf);

			$partialRootPaths = array();
			foreach(array_keys($plainConf['partialRootPath']) as $key) {
				$partialRootPath = isset($conf['partialRootPath.'][$key . '.']) ? $this->cObj->stdWrap($conf['partialRootPath.'][$key], $conf['partialRootPath.'][$key . '.']) : $conf['partialRootPath.'][$key];

				if ($partialRootPath) {
					$absPartialRootPath = GeneralUtility::getFileAbsFileName($partialRootPath);
					if ($absPartialRootPath == '') $absPartialRootPath = $partialRootPath;
					$partialRootPaths[] = $absPartialRootPath;
				}
			}

			$this->view->setPartialRootPath($partialRootPaths);
		}
	}

}