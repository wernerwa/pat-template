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

    $tmpl->applyInputFilter('ShortModifiers');

    $tmpl->readTemplatesFromInput('example_var_modifier_varscope.tmpl');

    $vars   =   array(
        'first'     => 'this is the first',
        'second'    => 'the second one',
        'third'     => 'third time is a charm'
        );
    $tmpl->addVars('page', $vars);

    $tmpl->displayParsedTemplate();
