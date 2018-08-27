<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
// Admin password: 1d9356e9b3c73da5cd655a7b5118eb881c13709f0108988266e9762a31cfd1b152a7242d56b5b4c982c9db3140b2679d61c4c79cc3be7164916d242b9fdbf9a5
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Willkommen in der Projektverwaltungs Plattform',
	'defaultController'=>'site/login',

	// preloading 'log' component
	'preload'=>array('log','booster'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		),

	'modules'=>array(
		// Parameters of the Gii Tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Hiwi07',
			//'ipFilters'=>array('192.168.5.*','::1'),
			),
		),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/site/index'),
			),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				),
			),
		'booster'=>array('class' => 'application.extensions.yiibooster.components.Booster',),

		//database settings
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1:8889;dbname=projekt_db',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'Uxj972Lr',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
			),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
			),
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'error, warning',
						),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				),		
				),
			),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'defaultPageSize' => 10,
		// list of items for the projekteingabemaske / aktualisieren
		'thematische_tags' => array(
			'KWK',
			'EE',
			'Biogas',
			'Glas',
			'Energieeffizienz',
			'E-Speicherung',
			'Netze',
			'E-Systeme',
			'Gasbeschaffenheit',
			'Emissionsminderung',
			'CNG',
			'LNG',
			'PtX',
			'Sektorenkopplung',
			'Methanisierung',
			'GHD',
			'GIS',
			'Simulation, Modellierung',
			'Wärmerückgewinnung',
			'Solarenergie',
			'SmartGrids',
			'Regelwerke',
			'Oxy-Fuel',
			'Wasserstoff',),
		'aktuellerstatus_tags' => array(
			'In Akquise',
			'Eingereicht',
			'Bewilligt',
			'Abgelehnt',
			'Zurückgezogen',
			'Planmäßig -> in Bearbeitung',
			'Abgeschlossen',
			'Verlängert',
			'Verzögert'),
		'fordermittelgeber_tags' => array(
			'AiF',
			'ZIM',
			'BMWi über PtJ',
			'BMWF über DLR',
			'BMWF',
			'MKULNV (NRW)',
			'FNR',
			'DBU',
			'EU über H2020',
			'EU über Interreg',
			'NRW über ETN',
			'WestNetz',
			'DVV',
			'DVGW',
			'DEW21',
			),
		'projektpartner_industrie_tags' => array(
			' '),
		'projektpartner_forschung_tags' => array(
			' '),
		),
	);
