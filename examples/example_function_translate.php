<?php
/**
 * patTemplate example that shows how to use template functions
 *
 * Template functions allow you to create custom tags, that will be
 * by PHP while the file is being read. See extending-pattemplate.txt
 * for more information on patTemplate functions.
 *
 * $Id: example_function_translate.php 258 2004-08-10 19:20:25Z schst $
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

    $tmpl->setOption('translationFolder', 'data');

    $tmpl->setOption('lang', 'de');

    /**
     * you may pass several langauges
     */
//  $tmpl->setOption( 'lang', array( 'de', 'foo' ) );

    /**
     * If you set lang to auto, the Translate function will check
     * HTTP_ACCEPT_LANGUAGE
     */
//  $tmpl->setOption( 'lang', 'auto' );

    $tmpl->readTemplatesFromInput('example_function_translate.tmpl');

    $tmpl->displayParsedTemplate('root');

    $tmpl->readTemplatesFromInput('example_function_translate2.tmpl');

    $tmpl->displayParsedTemplate('motu');
