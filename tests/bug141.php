<?php
require_once 'pat/patErrorManager.php';
require_once '../patTemplate.php';

// initialize an object of the class
$template = new patTemplate();

// set template location
$template->setBasedir('templates');

// set name of template file
$template->readTemplatesFromFile('pages/bug141.tmpl');

// parse and display the template
$template->DisplayParsedTemplate();
