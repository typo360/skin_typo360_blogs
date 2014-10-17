<?php
$EM_CONF[$_EXTKEY] = array (
	'title'					=> 'TYPO360 Blogs Template',
	'description'			=> 'Cette extension gère le template pour les blogs de l\'équipe typo360'  ,
	'author'				=> 'TYPO360',
	'author_email'			=> 'typo360@exl-group.com',
	'author_company'		=> 'EXL GROUP',

	'category'				=> 'templates',
	'shy'					=> 0,
	'version'				=> '1.0.0',
	'dependencies'			=> '',
	'conflicts'				=> '',
	'priority'				=> 'top',
	'loadOrder'				=> '',
	'module'				=> '',
	'state'					=> 'beta',
	'uploadfolder'			=> 0,
	'createDirs'			=> '',
	'modify_tables'			=> '',
	'clearcacheonload'		=> 1,
	'lockType'				=> '',
	'CGLcompliance'			=> NULL,
	'CGLcompliance_note'	=> NULL,
	'constraints'			=> array(
		'depends' => array(
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts'	=> array(),
		'suggests'	=> array (),
	)
);