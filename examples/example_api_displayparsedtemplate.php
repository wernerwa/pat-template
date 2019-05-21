<?php
/**
 * Example that uses displayParsedTemplate()
 * without specifying a name for the template.
 *
 * In this case the first template that has been loaded
 * will be used.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
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
    $tmpl->readTemplatesFromInput('example_api_displayparsedtemplate.tmpl');
    $tmpl->readTemplatesFromInput('example_api_displayparsedtemplate2.tmpl');

    $tmpl->displayParsedTemplate();
    echo    '<hr />';
    $tmpl->displayParsedTemplate('template1');
    echo    '<hr />';
    $tmpl->displayParsedTemplate('template2');
