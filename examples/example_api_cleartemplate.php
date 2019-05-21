<?php
/**
 * patTemplate example that shows how clear variables in a template
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate::setAttribute()
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

    $tmpl->readTemplatesFromInput('example_api_cleartemplate.tmpl');

    $tmpl->addVar('root', 'FOO', 'BAR');
    $tmpl->addVar('nested', 'FOO', 'BAR');
    $tmpl->addVar('cond', 'FOO', array( 'BAR', 'BAR' ));

    echo    "clear only the root template:<br>";

    $tmpl->clearTemplate('root');
    $tmpl->displayParsedTemplate();

    echo    "<hr />";

    echo    "clear the root template and its children:<br>";

    $tmpl->clearTemplate('root', true);
    $tmpl->displayParsedTemplate();
