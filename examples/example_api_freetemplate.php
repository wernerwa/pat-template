<?php
/**
 * patTemplate example that shows how clear variables in a template
 *
 * $Id: example_api_freetemplate.php 253 2004-07-15 19:53:45Z schst $
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate::setAttribute()
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

    $tmpl->readTemplatesFromInput('example_api_freetemplate.tmpl');

    echo    "By freeing the template, we may load it again without any conflicts<br />";
    $tmpl->freeTemplate('root', true);
    
    $tmpl->readTemplatesFromInput('example_api_freetemplate.tmpl');
