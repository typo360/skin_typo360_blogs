<?php
if(!defined('TYPO3_MODE')){
    die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	// Register backend layout data provider.
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutDataProvider']['SkinTypo360Blogs'] = 'EXL\\SkinTypo360Blogs\\Provider\\FileProvider';
}