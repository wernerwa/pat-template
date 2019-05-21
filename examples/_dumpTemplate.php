<?php
/**
 * patTemplate example that show how
 * to display debug information about
 * the loaded templates and their variables
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
    $tmpl->addModuleDir('Function', dirname(__FILE__) . '/functions');
    $tmpl->setRoot('templates');
    $tmpl->readTemplatesFromInput($_GET['template']);

    $tmpl->dump();
