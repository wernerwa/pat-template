<?php
/**
 * patTemplate example that uses nested variables
 *
 * $Id: example_realworld_nestedvars.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate::addGlobalVar()
 * @see         patTemplate::addGlobalVars()
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

    $tmpl->readTemplatesFromInput('example_realworld_nestedvars.tmpl');

    $tmpl->addGlobalVar('name', 'Stephan');
    $tmpl->addGlobalVar('surname', 'Schmidt');

    $tmpl->addVar('root', 'fullname', '{NAME} {SURNAME}');

    $tmpl->displayParsedTemplate('root');
