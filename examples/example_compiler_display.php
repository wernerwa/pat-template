<?php
/**
 * patTemplate example that shows how global variables
 * can be added.
 *
 * Global Variables will be replaced in all templates that
 * are loaded.
 *
 * You may add a global and a local variable with the same
 * name, but as globals are replaced after locals, you
 * will see the value of the local var.
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

   /**
    * compiler
    */
    require_once '../patTemplate/Compiler.php';


    $tmpl = new patTemplate_Compiler();
    $tmpl->setRoot('templates');

    $tmpl->setOption('compileFolder', 'compiledTemplates');

    $tmpl->readTemplatesFromInput('example_compiler_display.tmpl');

    $tmpl->compile('example1.php');

    $tmpl->addGlobalVar('GLOBAL', 'I\'m global.');

    $tmpl->addVar('template2', 'schst', array( 'one', 'two', 'repeat it.' ));

    $tmpl->addVar('template1', 'argh', array( 'one', 'two', 'repeat it.' ));

    $tmpl->addVars('template1', array(
                                        'foo' => 'This is a string',
                                        'bar' => 453
                                    ));

    /**
     * standard template and dependencies
     */
    echo '<fieldset><legend>template1</legend>';
    $tmpl->displayParsedTemplate('template1');
    echo '</fieldset><br />';

    /**
     * modulo
     */
    echo '<fieldset><legend>template3</legend>';
    $tmpl->addVar('template3', 'argh', array( 'one', 'two', 'repeat it.' ));
    $tmpl->displayParsedTemplate('template3');
    echo '</fieldset><br />';

    /**
     * simplecondition
     */
    echo '<fieldset><legend>template4</legend>';
    $tmpl->addVar('template4', 'FOO', 'set');
    $tmpl->displayParsedTemplate('template4');
    echo '</fieldset><br />';

    /**
     * condition
     */
    echo '<fieldset><legend>template5</legend>';
    $tmpl->addVar('template5', 'condVar', array( 'foo', 'bar' ));
    $tmpl->displayParsedTemplate('template5');
    echo '</fieldset><br />';
