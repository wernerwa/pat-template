<?php
/**
 * patTemplate example that displays the
 * usage of parseIntoVar()
 *
 * $Id: example_api_addobject.php 227 2004-06-03 18:14:13Z schst $
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
    
    $tmpl   =   &new patTemplate();
    $tmpl->setRoot('templates');
    $tmpl->readTemplatesFromInput('example_api_addobject.tmpl');

    $obj = new stdClass;
    $obj->name    = 'Frank';
    $obj->surname = 'Castle';
    $obj->age     = 45;
    
    $tmpl->addObject('page', $obj, 'obj_');

    $obj2 = new stdClass;
    $obj2->name    = 'Clark';
    $obj2->surname = 'Kent';
    $obj2->age     = 'unknown';
    
    $obj3 = new stdClass;
    $obj3->name    = 'Oliver';
    $obj3->surname = 'Queen';
    $obj->age     = '35';

    $tmpl->addObject('row', array( $obj, $obj2, $obj3 ), 'obj2_');
    
    $tmpl->displayParsedTemplate();
