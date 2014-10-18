<?php
namespace EXL\SkinTypo360Blogs\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 EXL GROUP <typo360@exl-group.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
use \TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper;

/**
 */
class GetFullTypoScriptConfigurationViewHelper extends AbstractBackendViewHelper {

	/**
	 * @param string $name
	 * @param string $configuration
	 */
	public function render($name = 'tsConf', $configuration = 'page') {
		/** @var $configurationManager \TYPO3\CMS\Extbase\Configuration\ConfigurationManager */
		$configurationManager = $this->objectManager->get('\\TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');

		/** @var $typoScriptService \TYPO3\CMS\Extbase\Service\TypoScriptService */
		$typoScriptService = $this->objectManager->get('\\TYPO3\\CMS\\Extbase\\Service\\TypoScriptService');

		$typoScriptConfiguration = $configurationManager->getConfiguration($configurationManager::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
		$typoScriptConfiguration = $typoScriptService->convertTypoScriptArrayToPlainArray($typoScriptConfiguration);

		$finalConfiguration = array();

		$configurationValues = GeneralUtility::trimExplode(',', $configuration);
		if (!empty($configurationValues)) {
			foreach($configurationValues as $value) {
				if ($value == 'request') {
					$finalConfiguration = array_merge($finalConfiguration, array('request' => $this->controllerContext->getRequest()));
					continue;
				}

				$valueKeys = GeneralUtility::trimExplode('.', $value);

				if (!empty($valueKeys)) {
					$tmpConfiguration = $typoScriptConfiguration;
					foreach($valueKeys as $key) {
						if (!isset($tmpConfiguration[$key])) {
							$tmpConfiguration = null;
							break;
						}
						$tmpConfiguration = $tmpConfiguration[$key];
					}

					if ($tmpConfiguration) {
						$final = array();
						$this->setDeepArray($final, $value, $tmpConfiguration);

						$finalConfiguration = array_merge($finalConfiguration, $final);
					}
				}
			}
		}

		$this->templateVariableContainer->add($name, $finalConfiguration);
	}

	/**
	 * @param $array
	 * @param $keys
	 * @param $value
	 */
	private function setDeepArray(&$array, $keys, $value) {
		$keys = GeneralUtility::trimExplode('.', $keys);
		$current = &$array;
		foreach($keys as $key) {
			$current = &$current[$key];
		}
		$current = $value;
	}

}

?>