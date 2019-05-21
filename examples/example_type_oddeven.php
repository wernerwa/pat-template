<?php
/**
 * Example for an oddEven template
 *
 * An odd-even template allows you to define two sub-templates for alternating lists.
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
    $tmpl->readTemplatesFromInput('example_type_oddeven.tmpl');

    $tmpl->addVar('row', 'value', array( 'one', 'two', 'three', 'four', 'five' ));

    $tmpl->displayParsedTemplate('row');
