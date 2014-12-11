<?php
if(!defined('TYPO3_MODE')){
    die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	// Register backend layout data provider.
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutDataProvider']['SkinTypo360Blogs'] = 'EXL\\SkinTypo360Blogs\\Provider\\FileProvider';
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Fluid\\View\\StandaloneView'] = array(
	'className' => 'EXL\\SkinTypo360Blogs\\Xclass\\StandaloneView',
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Frontend\\ContentObject\\FluidTemplateContentObject'] = array(
	'className' => 'EXL\\SkinTypo360Blogs\\Xclass\\FluidTemplateContentObject',
);

// Adding custom roles to medias for pages.
\TYPO3\ExlPagesUtilities\Utility\ResourceMedia::addCustomRole('banner', 'LLL:EXT:skin_typo360_blogs/Resources/Private/Language/locallang.xlf:pages.medias.custom_roles.banner');
\TYPO3\ExlPagesUtilities\Utility\ResourceMedia::addCustomRole('article_thumbnail', 'LLL:EXT:skin_typo360_blogs/Resources/Private/Language/locallang.xlf:pages.medias.custom_roles.article_thumbnail');