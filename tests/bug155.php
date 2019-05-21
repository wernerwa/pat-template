<?php
require_once 'pat/patErrorManager.php';
require_once '../patTemplate.php';

// initialize an object of the class
$template = new patTemplate();

// set template location
$template->setRoot('templates');

// set name of template file
$result = $template->readTemplatesFromFile('bug155.tmpl');

$obj = new stdClass();
$obj->foo = "Scalar value";
$obj->bar = array();
$obj->bar[0] = new stdClass();
$obj->bar[0]->foo = 'one';
$obj->bar[0]->bar = 'tomato';
$obj->bar[1] = new stdClass();
$obj->bar[1]->foo = 'two';
$obj->bar[1]->bar = 'tomato';
$obj->baz = array();
$obj->baz[0] = new stdClass();
$obj->baz[0]->foo = 'eins';
$obj->baz[0]->bar = 'apfel';
$obj->baz[1] = new stdClass();
$obj->baz[1]->foo = 'zwei';
$obj->baz[1]->bar = 'birne';

$template->addObject('page', $obj);

// parse and display the template
$template->displayParsedTemplate('page');
