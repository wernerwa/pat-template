<?php
/**
 * Example that uses the String reader instead
 * of the default file reader.
 *
 * The String Reader allows you to read templates from any variable by passing
 * it a string. You can always use this to read from a custom source.
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




    $tmpl = new patTemplate('html');

    $string = '<patTemplate:tmpl name="string">This template has been parsed from a string <patTemplate:tmpl name="too">, as well as this.</patTemplate:tmpl></patTemplate:tmpl>';

    $tmpl->readTemplatesFromInput($string, 'String');

    $tmpl->dump();
