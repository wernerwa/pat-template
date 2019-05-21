<?php
/**
 * patTemplate example that shows how to use simple conditions
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

    $tmpl->readTemplatesFromInput('example_type_simplecondition.tmpl');

    $rows = array(
                    array( 'foo' => 'foo', 'bar' => 'bar' ),
                    array( 'foo' => 'foo' ),
                    array( 'foo' => 'foo', 'bar' => 0 )
                );

    $tmpl->addRows('cond', $rows);
    $tmpl->addVar('container', 'foo', 'This is foo!');

    $tmpl->addVar('cond3', 'foo', 'bar');
    $tmpl->addVar('cond4', 'foo', 'bar');
    $tmpl->addVar('cond4', 'argh', 'foobar');

    $tmpl->displayParsedTemplate('root');
