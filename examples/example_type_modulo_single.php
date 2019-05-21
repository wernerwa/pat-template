<?php
/**
 * patTemplate modulo example
 *
 * A modulo template allows you to define any number of sub-templates
 * for alternating lists. It is similar to odd-even templates.
 *
 * This example uses the special '__single' condition, which can be
 * used in modulo and condition templates.
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
    $tmpl->readTemplatesFromInput('example_type_modulo_single.tmpl');

    $tmpl->addVar('row', 'foo', 'bar');

    $tmpl->displayParsedTemplate('row');
