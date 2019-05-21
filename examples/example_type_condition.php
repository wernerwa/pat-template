<?php
/**
 * Basic patTemplate example that shows how to
 * use condition templates.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.de
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
    $tmpl->readTemplatesFromInput('example_type_condition.tmpl');

    $tmpl->addVar('cond', 'foo', array( 'bar', 0, 'any', 'bar', 'foo', 'argh', 'test' ));

    $tmpl->displayParsedTemplate();
