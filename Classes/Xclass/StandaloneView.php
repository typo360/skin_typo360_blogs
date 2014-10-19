<?php
namespace EXL\SkinTypo360Blogs\Xclass;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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

class StandaloneView extends \TYPO3\CMS\Fluid\View\StandaloneView {
	/**
	 * Path(s) to the partial root. If NULL, then $this->partialRootPathPattern will be used.
	 *
	 * @var array
	 */
	protected $partialRootPaths = NULL;

	/**
	 * Resolve the partial path and filename based on $this->getPartialRootPath() and request format
	 *
	 * @param string $partialName The name of the partial
	 * @return string the full path which should be used. The path definitely exists.
	 * @throws \TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException
	 */
	protected function getPartialPathAndFilename($partialName) {
		$partialRootPaths = $this->getPartialRootPath();

		if (!is_array($partialRootPaths)) {
			$partialRootPaths = array($partialRootPaths);
		}

		$possiblePartialPaths = array();
		foreach($partialRootPaths as $partialRootPath) {
			if (!is_dir($partialRootPath)) {
				throw new \TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException('Partial root path "' . $partialRootPath . '" does not exist.', 1288094648);
			}
			$possiblePartialPaths[] = \TYPO3\CMS\Core\Utility\GeneralUtility::fixWindowsFilePath($partialRootPath . '/' . $partialName . '.' . $this->getRequest()->getFormat());
			$possiblePartialPaths[] = \TYPO3\CMS\Core\Utility\GeneralUtility::fixWindowsFilePath($partialRootPath . '/' . $partialName);
		}

		foreach ($possiblePartialPaths as $partialPathAndFilename) {
			if (is_file($partialPathAndFilename)) {
				DebuggerUtility::var_dump($partialPathAndFilename, '$partialPathAndFilename');
				return $partialPathAndFilename;
			}
		}

		throw new \TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException('Could not load partial file. Tried following paths: "' . implode('", "', $possiblePartialPaths) . '".', 1288092556);
	}

}