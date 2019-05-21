<?php
/**
 * Example that shows the use of the sub tag
 *
 * The sub tag is used, when it comes to condition templates. It splits a
 * template into smaller parts, that are addressedwith the same name.
 *
 * Which part is displayed, depends on the condition you specified.
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

    $tmpl->readTemplatesFromInput('example_tags_sub.tmpl');

    $tmpl->displayParsedTemplate();
