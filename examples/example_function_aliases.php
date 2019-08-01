<?php
/**
 * patTemplate example that shows how to use aliases for template functions
 *
 * Aliases can be set from PHP or directly from the template.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate_Function
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

    $tmpl->setOption('functionAliases', array('uhrzeit' => 'time'));

    $tmpl->readTemplatesFromInput('example_function_aliases.tmpl');

    $tmpl->displayParsedTemplate('page');
