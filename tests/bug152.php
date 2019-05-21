<?php
require_once 'pat/patErrorManager.php';
require_once '../patTemplate.php';

// initialize an object of the class
$template = new patTemplate();

// set template location
$template->setRoot('templates');

echo "<h1>Single value</h1>";

echo "<h2>Test with __single</h2>";

// set name of template file
$result = $template->readTemplatesFromFile('bug152.tmpl');

$template->addVar('cond-with-single', 'MYVAR', 'MYVALUE');

// parse and display the template
$template->displayParsedTemplate('cond-with-single');

echo "<h2>Test without __single</h2>";

$template->addVar('cond-without-single', 'MYVAR', 'MYVALUE');

// parse and display the template
$template->displayParsedTemplate('cond-without-single');



echo "<h1>Single value</h1>";

echo "<h2>Test with __single</h2>";

$template->addVar('cond-with-single', 'MYVAR', array('one', 'two', 'three'));

// parse and display the template
$template->displayParsedTemplate('cond-with-single');

echo "<h2>Test without __single</h2>";

$template->addVar('cond-without-single', 'MYVAR', array('one', 'two', 'three'));

// parse and display the template
$template->displayParsedTemplate('cond-without-single');
