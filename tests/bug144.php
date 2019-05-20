<?php
require_once 'pat/patErrorManager.php';
require_once '../patTemplate.php';

// initialize an object of the class
$template = new patTemplate();

// set template location
$template->setRoot('templates');

$template->setNamespace('pat');

// set name of template file
$template->readTemplatesFromFile('bug144.tmpl');

$template->applyOutputFilter('StripWhitespace');

$template->addVar('page', 'foo', utf8_encode('Data with UTF-8 encoded characters à ä ö Ü é'));

header('Content-Type: text/html; charset=utf-8');

// parse and display the template
$template->DisplayParsedTemplate();
