<?php
/**
 * Example that uses the IT reader instead
 * of the default file reader.
 *
 * The IT reader allows you to read templates that have been
 * created to be used with HTML_Template_IT
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
    $tmpl->setRoot(array('templates', 'templates-2'));

    $tmpl->readTemplatesFromInput('example_reader_file_multiple.tmpl');
    $tmpl->displayParsedTemplate();
