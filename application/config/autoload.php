<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','form_validation');


$autoload['drivers'] = array();


$autoload['helper'] = array('url','form','date','cookie');


$autoload['config'] = array();


$autoload['language'] = array();

$autoload['model'] = array('Organisateur','Benevole','Event','Participer','Typeevent','CookieBenModel','CookieOrgaModel');
