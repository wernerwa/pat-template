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

    $tmpl->readTemplatesFromInput('example_var_modifier_placeholder.tmpl');

    $tmpl->addVar('page', 'length', 30);
    $tmpl->addVar('page', 'suffix', '<strong title="local variables override global ones...">local suffix</strong>');

    $tmpl->addGlobalVar('prefix', '<b>global prefix</b>');
    $tmpl->addGlobalVar('suffix', '<b>global suffix</b>');

    $tmpl->addVar('page', 'text', 'This text is way too long! This text is way too long! This text is way too long! This text is way too long!');


    $tmpl->displayParsedTemplate();
