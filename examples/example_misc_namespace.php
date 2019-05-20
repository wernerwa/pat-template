<?php
/**
 * patTemplate example that shows how to change the
 * namespace patTemplate is using.
 *
 * As typing <patTemplate:tmpl/> all the time can
 * get quite annoying, patTemplate allows you to
 * change its namespace to whatever you like.
 *
 * $Id: example_misc_namespace.php 155 2004-04-20 20:16:43Z schst $
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
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

    $tmpl->setNamespace('foo');
    
    $tmpl->readTemplatesFromInput('example_misc_namespace.tmpl');
    $tmpl->displayParsedTemplate();
