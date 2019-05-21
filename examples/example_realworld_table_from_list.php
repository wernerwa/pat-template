<?php
/**
 * patTemplate example that creates a table from a
 * two dimensional array
 *
 * $Id: example_realworld_table_from_list.php 453 2007-05-30 12:58:43Z gerd $
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
    $tmpl->readTemplatesFromInput('example_realworld_table_from_list.tmpl');

    $list = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 );

    $tmpl->addVar('cell', 'value', $list);
    $tmpl->addVar('cell', 'value2', array_reverse($list));
    $tmpl->displayParsedTemplate();
