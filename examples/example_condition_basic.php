<?php
/**
 * Basic patTemplate example
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
    $tmpl->readTemplatesFromInput('condition.tmpl');

    $tmpl->addVar('cond', 'foo', array( 'any', 'bar', 'foo', 'argh', 'test' ));

    echo $tmpl->getParsedTemplate('cond');
