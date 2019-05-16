<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','form_validation');


$autoload['drivers'] = array('session');


$autoload['helper'] = array('url','form','date','cookie');


$autoload['config'] = array();


$autoload['language'] = array();

$autoload['model'] = array('organisateur','benevole','event','participer','typeevent','CookieBenModel','CookieOrgaModel');
