<?php
/**
 * patTemplate example that shows how to copy
 * a var, apply a modifier without showing it
 * and still use it in a condition.
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

    $tmpl->readTemplatesFromInput('example_realworld_changesource.tmpl');

    $tmpl->setAttribute('main', 'src', 'example_realworld_changesource_home.tmpl');

    $tmpl->displayParsedTemplate();
