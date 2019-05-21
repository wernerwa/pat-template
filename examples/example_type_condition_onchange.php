<?php
/**
 * Basic patTemplate example that shows how to
 * use condition templates.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.de
 */

/**
 * Main examples prepend file, needed *only* for the examples framework!
 */
include_once 'patExampleGen/prepend.php';

// EXAMPLE START ------------------------------------------------------

/**
 * patErrorManager class
 */
require_once $neededFiles['patErrorManager'];

/**
 * patTemplate
 */
require_once $neededFiles['patTemplate'];

$tmpl = new patTemplate();
$tmpl->setRoot('templates');
$tmpl->readTemplatesFromInput('example_type_condition_onchange.tmpl');

$data = array(
            array('project' => 'patError',
                  'developer' => 'schst'),
            array('project' => 'patError',
                  'developer' => 'argh'),
            array('project' => 'patError',
                  'developer' => 'gERD'),
            array('project' => 'patTemplate',
                  'developer' => 'schst'),
            array('project' => 'patError',
                  'developer' => 'gERD'),
        );

$tmpl->addRows('list', $data);
$tmpl->displayParsedTemplate();
