<?php
/**
 * Example that shows the use of the tmpl tag
 *
 * The template tag is the most important tag.
 * It allows you to split your file into smaller parts.
 *
 * $Id: example_tags_tmpl.php 453 2007-05-30 12:58:43Z gerd $
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

    $tmpl->readTemplatesFromInput('example_tags_tmpl.tmpl');

    $tmpl->displayParsedTemplate('template1');

    $tmpl->displayParsedTemplate('template2');
