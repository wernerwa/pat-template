<?php
/**
 * Example that shows the use of variable modifiers
 *
 * @author      gERD Schaufelberger <gerd@php-tools.net>
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

    $tmpl->readTemplatesFromInput('example_modifier_calc.tmpl');

    $tmpl->addVar('page', 'a', 42);
    $tmpl->addVar('page', 'b', 100);
    $tmpl->addVar('page', 'c', 7);


    $tmpl->addVar('list', 'a', array( 37, 56, 4, 9, 104, 317 ));
    $tmpl->addVar('list', 'b', array( 72, 94, 53, 54, 7, 276 ));
    $tmpl->addVar('list', 'c', array( 411, 1, 130, 99, 95, 0 ));

    $tmpl->displayParsedTemplate();
