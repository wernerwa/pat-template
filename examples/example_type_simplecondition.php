<?php
/**
 * patTemplate example that shows how to use simple conditions
 *
 * $Id: example_type_simplecondition.php 269 2004-08-19 08:25:25Z schst $
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

    $tmpl->readTemplatesFromInput('example_type_simplecondition.tmpl');

    $rows = array(
                    array( 'foo' => 'foo', 'bar' => 'bar' ),
                    array( 'foo' => 'foo' ),
                    array( 'foo' => 'foo', 'bar' => 0 )
                );
    
    $tmpl->addRows('cond', $rows);
    $tmpl->addVar('container', 'foo', 'This is foo!');
    
    $tmpl->displayParsedTemplate('root');
