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
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 */
class HeaderMenuViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper implements \TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface {
	/** @var \TYPO3\CMS\Dbal\Database\DatabaseConnection */
	private static $database;

	/**
	 * @param string $root
	 * @param string $as
	 * @param int $depth
	 * @param string $doktypes
	 * @return string
	 */
	public function render($root, $as = 'menuPages', $depth = 2, $doktypes = '1') {
		return self::renderStatic($this->arguments, $this->buildRenderChildrenClosure(), $this->renderingContext);
	}

	/**
	 * @param array $arguments
	 * @param \Closure $renderChildrenClosure
	 * @param \TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
	 * @return string
	 * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
	 */
	static public function renderStatic(array $arguments, \Closure $renderChildrenClosure, \TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
		$templateVariableContainer = $renderingContext->getTemplateVariableContainer();
		if ($arguments['root'] === NULL) {
			return '';
		}
		if (!MathUtility::canBeInterpretedAsInteger($arguments['root']) || $arguments['root'] < 0) {
			throw new \TYPO3\CMS\Fluid\Core\ViewHelper\Exception('HeaderMenuViewHelper : argument "root" is not valid', 1413069759);
		}

		self::$database = self::getDatabaseConnection();

		$doktypes = array();
		foreach(GeneralUtility::trimExplode(',', $arguments['doktypes']) as $doktype) {
			if (MathUtility::canBeInterpretedAsInteger($doktype)) $doktypes[] = $doktype;
		}

		$pages = self::getPage($arguments['root'], $arguments['depth'], $doktypes);
		$templateVariableContainer->add($arguments['as'], $pages);

		$output = $renderChildrenClosure();

		$templateVariableContainer->remove($arguments['as']);

		return $output;
	}

	/**
	 * @param $uid
	 * @param $maxDepth
	 * @param array $doktypes
	 * @param int $depth
	 * @return array
	 */
	static function getPage($uid, $maxDepth, $doktypes = array(), $depth = 0) {
		$result = array();

		$condition = 'deleted=0 AND hidden=0 AND pid=' . $uid;
		if (!empty($doktypes)) {
			$condition .= ' AND doktype IN(' . implode(',', $doktypes) . ')';
		}

		$pages = self::$database->exec_SELECTgetRows(
			'uid, pid, title',
			'pages',
			$condition
		);

		if ($pages !== NULL && !empty($pages)) {
			foreach($pages as $page) {
				if ($page['uid'] == $GLOBALS['TSFE']->id) {
					$page['current'] = 'current';
					$page['active'] = 'active';
				}

				$children = self::getPage($page['uid'], $maxDepth, $doktypes, $depth + 1, $page);
				if (!empty($children)) {
					foreach($children as $child) {
						if ($child['active']) {
							$page['active'] = 'active';
							break;
						}
					}

					$page['children'] = $children;
				}

				$result[] = $page;
			}
		}

		return $result;
	}

	/**
	 * @return \TYPO3\CMS\Dbal\Database\DatabaseConnection
	 */
	protected static function getDatabaseConnection() {
		return $GLOBALS['TYPO3_DB'];
	}
}
