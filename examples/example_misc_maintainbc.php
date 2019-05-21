<?php
/**
 * patTemplate example that shows how to disable backwards
 * compatibility
 *
 * This means that by setting the option 'maintainBc' to false
 * patTemplate will not recognize the conditions 'default',
 * 'empty', 'odd' and 'even' as special conditions, but as
 * normal strings.
 *
 * You should always use '__default', '__empty', '__odd' and
 * '__even' instead.
 *
 * In future versions, backwards compatibility will be disabled
 * by default.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate::setOption()
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

    /**
     * if you remove this line, patTemplate will maintain
     * bc, that means condition="default" is identical to
     * condition="__default""
     */
    $tmpl->setOption('maintainBc', false);

    $tmpl->readTemplatesFromInput('example_misc_maintainbc.tmpl');

    $tmpl->addVar('cond', 'bc', array( 'one', 'two', 'default', 'three' ));

    $tmpl->displayParsedTemplate();
