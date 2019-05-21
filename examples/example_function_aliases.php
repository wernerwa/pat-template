<?php
/**
 * patTemplate example that shows how to use aliases for template functions
 *
 * Aliases can be set from PHP or directly from the template.
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

    $tmpl->setOption('functionAliases', array('uhrzeit' => 'time'));

    $tmpl->readTemplatesFromInput('example_function_aliases.tmpl');

    $tmpl->displayParsedTemplate('page');
