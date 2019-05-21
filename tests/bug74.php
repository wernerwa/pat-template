<?php
require_once 'pat/patErrorManager.php';
require_once '../patTemplate.php';

// initialize an object of the class
$template = new patTemplate();

// set template location
$template->setRoot('templates');

// set name of template file
$result = $template->readTemplatesFromFile('bug74.tmpl');

$data = array(
            'one', 'two', 'three', 'four', 'five'
        );

$types = array('yes', 'no', 'no', 'yes');

foreach ($types as $type) {
    $template->addVar('list_row', 'myVar', $type);
    shuffle($data);
    $template->addVar('list_entry', 'SOMETHING', $data);

    $template->parseTemplate('list_row', 'a');
}

// parse and display the template
$template->displayParsedTemplate('page');
