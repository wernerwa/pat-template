<?php
/**
 * patTemplate example that shows how to use template functions
 *
 * This example uses the autoload feature of the 'Call' function
 * which will allow you to dynamically load the components whenever
 * they are needed.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate_Function
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
    $tmpl->setOption('componentFolder', 'components');
    $tmpl->setOption('componentExtension', 'tmpl');

    $tmpl->readTemplatesFromInput('example_function_call.tmpl');

    $tmpl->displayParsedTemplate('page');
