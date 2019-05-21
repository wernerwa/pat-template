<?php
/**
 * patTemplate example that shows how to use template functions
 *
 * This example shows you how map tags to templates by setting
 * the call function as default.
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
    $tmpl->setOption('defaultFunction', 'Call');

    $tmpl->readTemplatesFromInput('components/hint.tmpl');
    $tmpl->readTemplatesFromInput('components/news.tmpl');

    $tmpl->readTemplatesFromInput('example_function_default.tmpl');

    $tmpl->displayParsedTemplate('page');
