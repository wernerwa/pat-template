<?php
/**
 * patTemplate example that shows autonaming works.
 *
 * Since version 3.0.0 you do not need to specify a name
 * attribute for your templates, as long as you do not need
 * to access them from PHP.
 *
 * patTemplate will assign them a unique name.
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

    $tmpl->readTemplatesFromInput('example_misc_autonaming.tmpl');
    $tmpl->dump();
