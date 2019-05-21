<?php
/**
 * patTemplate example to showcase the Dot-Syntax.
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
    $tmpl->readTemplatesFromInput('example_misc_dotsyntax.tmpl');

    $tmpl->addVar('source', 'foo', array( 'bar', 'any', 'bar', 'foo', 'argh', 'test' ));

    $tmpl->displayParsedTemplate('source');
