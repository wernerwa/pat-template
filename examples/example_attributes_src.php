<?php
/**
 * Example that shows the use of a template tag
 * with an external source
 *
 * The src attribute allows you to split your HTML
 * code into different files, so it's more reusable.
 *
 * Common practice is to move a header and footer
 * into separate files and include them in your
 * main templates.
 *
 * $Id: example_attributes_src.php 453 2007-05-30 12:58:43Z gerd $
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


    $tmpl   =   &new patTemplate();
    $tmpl->setRoot('templates');

    $tmpl->readTemplatesFromInput('example_attributes_src.tmpl');

    $tmpl->displayParsedTemplate();
