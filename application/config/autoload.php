<?php if(!defined('BASEPATH')) exit('Pas d\'accès direct');
/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
|
| only the absolute minimal resources are loaded by default. 
| (the database is not connected by default)
|
| 1. Packages
| 2. Libraries
| 3. Helper files
| 4. Custom config files
| 5. Language files
| 6. Models
|
*/

//$autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');

$autoload['packages'] = array();


// Classes located in the system/libraries or application/libraries 
//$autoload['libraries'] = array('database', 'session', 'xmlrpc');

$autoload['libraries'] = array('database', 'session');


//	$autoload['helper'] = array('url', 'file');

$autoload['helper'] = array('url', 'file','cias_helper','security');

//	$autoload['config'] = array('config1', 'config2');
// ONLY if you have created custom  config files.  

$autoload['config'] = array();


//	$autoload['language'] = array('lang1', 'lang2');
// Do not include the "_lang" part of your file.  For example
// "codeigniter_lang.php" would be referenced as array('codeigniter');

$autoload['language'] = array();

//	$autoload['model'] = array('model1', 'model2');

$autoload['model'] = array();
/* */
