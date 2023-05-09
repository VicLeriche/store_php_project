<?php
/**
 * fichier de configuration qui déclare toutes les constantes utilisées dans les classes
**/

//const ENV = "dev";
const ENV = "dev";

// global
const SITE_ROOT 	= '';
const SITE_ROOT_ADMIN 	= '';
const SITE_REP    = '';

// mysql
// base de données

const DB = [
    "dev"=> [
        'BDD_SGBD'        => 'mysql',
        'BDD_DATABASE'    => 'e_commerce',
        'BDD_HOST'        => 'localhost',
        'BDD_PASSWORD'    => '',
        'BDD_USER'        => 'root',
    ],
    "prod"=>[
        'BDD_SGBD'        => 'mysql',
        'BDD_DATABASE'    => 'epiz_34173740_store',
        'BDD_HOST'        => 'sql306.epizy.com',
        'BDD_PASSWORD'    => 'nGhmNsiVs4',
        'BDD_USER'        => 'epiz_34173740',
    ]
];

const DB_CONFIG = DB[ENV];

// tables principales
const TABLE_PUR		= 'purchases';
const TABLE_PROD	= 'products';
const TABLE_USR		= 'users';

const BASE_URL_IMAGE = 'assets/img/articles/';
?>
