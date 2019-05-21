<?php
/**
 * patTemplate example that shows how to change the
 * namespace patTemplate is using.
 *
 * As typing <patTemplate:tmpl/> all the time can
 * get quite annoying, patTemplate allows you to
 * change its namespace to whatever you like.
 *
 * $Id: example_misc_namespace.php 453 2007-05-30 12:58:43Z gerd $
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

    // you may set one or more namespaces
    $tmpl->setNamespace(array('foo', 'bar'));


    $tmpl->readTemplatesFromInput('example_misc_namespace.tmpl');
    $tmpl->displayParsedTemplate();
