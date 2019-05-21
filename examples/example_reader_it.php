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




    $tmpl = new patTemplate('html');
    $tmpl->setRoot('templates');

    $data = array(
                    "0" => array("Stig", "Bakken"),
                    "1" => array("Martin", "Jansen"),
                    "2" => array("Alexander", "Merz")
                );

    $tmpl->readTemplatesFromInput('example_reader_it.tmpl', 'IT');
    $tmpl->addVar('row', 'value', $data);
    $tmpl->displayParsedTemplate();
