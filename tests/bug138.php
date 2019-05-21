<?php
require_once 'pat/patErrorManager.php';
require_once '../patTemplate.php';

$tmpl = new patTemplate();
$tmpl->setRoot('templates');
$tmpl->readTemplatesFromInput('bug138.tmpl');

echo '<pre>';
echo 'Display template without setting a variable';
echo htmlentities($tmpl->getParsedTemplate('table'));
echo '<pre>';


$tmpl->clearAllTemplates();
$tmpl->addVar('row', 'VALUE', 'one');
echo '<pre>';
echo 'Display template with setting one value';
echo htmlentities($tmpl->getParsedTemplate('table'));
echo '<pre>';

$tmpl->clearAllTemplates();
$tmpl->addVar('row', 'VALUE', array('one', 'two', 'three', 'four', 'five'));
echo '<pre>';
echo 'Display template with setting more than one value';
echo htmlentities($tmpl->getParsedTemplate('table'));
echo '<pre>';
