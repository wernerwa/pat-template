<?php
/**
 * patTemplate example that displays the
 * usage of parseIntoVar()
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
    $tmpl->readTemplatesFromInput('example_api_parseintovar.tmpl');

    $tmpl->addVar('src', 'foo', 'tomato');
    $tmpl->parseIntoVar('src', 'dest', 'BAR');

    $tmpl->clearTemplate('src');
    $tmpl->addVar('src', 'foo', 'coconut');
    $tmpl->parseIntoVar('src', 'dest', 'BAR', true);


    $tmpl->displayParsedTemplate();
