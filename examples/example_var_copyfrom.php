<?php
/**
 * patTemplate example that shows how variables
 * may copy their value from any other variable.
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

    $tmpl->readTemplatesFromInput('example_var_copyfrom.tmpl');

    $tmpl->addVar('page', 'sometext', 'This text
contains
some
line
breaks.');

    $tmpl->addVar('repeating', 'value', array( 'une', 'deux', 'trois' ));
    $tmpl->addVar('non-repeating', 'scalar', 'Copy');

    $tmpl->displayParsedTemplate();
