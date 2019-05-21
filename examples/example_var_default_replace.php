<?php
/**
 * Example that shows the use of variable modifiers
 *
 * patTemplate allows you to use any PHP function as
 * a variable modifier.
 * Furthermore, you may create custom modifiers, see
 * extending-pattemplate.txt for more information.
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

    // $tmpl->setDefaultAttribute( 'attributeplaceholder', 'replace' );

    $tmpl->readTemplatesFromInput('example_var_default_replace.tmpl');

    $tmpl->addGlobalVar('normal', 'normal content');
    $tmpl->addGlobalVar('recursive', 'recursive removal');
    $tmpl->addGlobalVar('var', 'Remove {RECURSIVE} var: {VAR}');

    $tmpl->addGlobalVar('much_more', 'This is global, but NOT the default value!');
    $tmpl->addVar('page', 'much_more', 'NOT the default value!');

    $tmpl->displayParsedTemplate();
