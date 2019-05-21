<?php
/**
 * patTemplate example that shows how variables
 * can be added.
 *
 * The var tag allows you to include a variable in a template. There are several
 * advantages over using the {BRACES} syntax, like the ability
 * to set a default value or a modifier.
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

    $tmpl->readTemplatesFromInput('example_tags_var.tmpl');
    $tmpl->displayParsedTemplate('foo');

    $tmpl->clearTemplate('foo');
    $tmpl->addVar('foo', 'myvar', 'value was set from PHP');
    $tmpl->displayParsedTemplate();
