<?php
/**
 * Example that shows the use of the rowoffset attribute
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

    $tmpl->readTemplatesFromInput('example_attributes_rowoffset.tmpl');

    $heroes = array( 'Superman', 'Batman', 'Green Lantern', 'Robin', 'Wonder Woman', 'Powergirl' );

    $tmpl->addVar('row', 'hero', $heroes);

    $tmpl->addVar('row2', 'hero', $heroes);

    $tmpl->displayParsedTemplate();
