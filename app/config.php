<?php
return array(
		"siteUrl"=>"http://127.0.0.1/RT-Cloud/",
		"documentRoot"=>"Accueil",
		"database"=>[
				"dbName"=>"cloud",
				"serverName"=>"127.0.0.1",
				"port"=>"3306",
				"user"=>"root",
				"password"=>""
		],
		"onStartup"=>function($action){
		},
		"directories"=>["my"],
		"templateEngine"=>'micro\views\engine\Twig',
		"templateEngineOptions"=>array("cache"=>false),
		"test"=>false,
		"cloud"=>array('root'=>'files/',
				'prefix'=>'srv-')
);