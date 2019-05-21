<?php
/**
 * patTemplate example that shows how to
 * use the 'varscope' attribute with a list of templates.
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

    $tmpl->readTemplatesFromInput('example_attributes_varscope_multiple.tmpl');

    $tmpl->addVar('storage1', 'foo', 'Varscope now accepts a list of templates.');
    $tmpl->addVar('storage2', 'bar', 'The first one has the highest priority');

    $tmpl->displayParsedTemplate('page');
