<?php
require_once 'pat/patErrorManager.php';
require_once '../patTemplate.php';

// initialize an object of the class
$template = new patTemplate();

// set template location
$template->setRoot('templates');

$template->setNamespace('pat');

// set name of template file
$template->readTemplatesFromFile('bug145.tmpl');

$template->addVar('page', 'foo', 'Variable set');

// parse and display the template
$template->DisplayParsedTemplate();
