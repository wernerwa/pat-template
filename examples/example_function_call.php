<?php
/**
 * patTemplate example that shows how to use template functions
 *
 * Template functions allow you to create custom tags, that will be
 * by PHP while the file is being read. See extending-pattemplate.txt
 * for more information on patTemplate functions.
 *
 * $Id: example_function_call.php 320 2004-10-28 15:07:07Z schst $
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
    
    $tmpl   =   &new patTemplate();
    $tmpl->setRoot('templates');
    
    $tmpl->readTemplatesFromInput('components/hint.tmpl');
    $tmpl->readTemplatesFromInput('components/news.tmpl');

    $tmpl->readTemplatesFromInput('example_function_call.tmpl');

    $tmpl->displayParsedTemplate('page');
