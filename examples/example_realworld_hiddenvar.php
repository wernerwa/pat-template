<?php
/**
 * patTemplate example that shows how to copy
 * a var, apply a modifier without showing it
 * and still use it in a condition.
 *
 * $Id: example_realworld_hiddenvar.php 453 2007-05-30 12:58:43Z gerd $
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




    $tmpl   =   &new patTemplate();
    $tmpl->setRoot('templates');

    $tmpl->readTemplatesFromInput('example_realworld_hiddenvar.tmpl');

    $tmpl->addVar('page', 'string', 'schst');

    $tmpl->displayParsedTemplate();
