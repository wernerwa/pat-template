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

    error_reporting(E_ALL);

   /**
    * requires patErrorManager
    * make sure that it is in your include path
    */
    require_once('pat/patErrorManager.php');

   /**
    * main class
    */
    require_once '../patTemplate.php';

    $tmpl = new patTemplate();
    $tmpl->setRoot('templates');
    $tmpl->readTemplatesFromInput('example_type_condition_variable.tmpl');

    $tmpl->addVar('cond', 'bar', 'bar');
    $tmpl->addVar('cond', 'foo', array( 'bar', 0, 'any', 'bar', 'foo', 'argh', 'test' ));

    $tmpl->displayParsedTemplate();
