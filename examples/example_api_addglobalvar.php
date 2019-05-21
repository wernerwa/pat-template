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

    $tmpl = new patTemplate();
    $tmpl->setRoot('templates');

    $tmpl->readTemplatesFromInput('example_api_addglobalvar.tmpl');

    $tmpl->addGlobalVar('bar', 'I\'m global!');
    $tmpl->addGlobalVar('global_foo', 'This variable is available for global-skope');
    $tmpl->addGlobalVar('local_bar', 'Global varaibles cannot overwrite local values...');
    $tmpl->addGlobalVar('local_foo', '...even if the local values are set to empty string.');
    $tmpl->addGlobalVars(
        array(
                                    'name' => 'schst',
                                    'realname' => 'Stephan Schmidt'
                                ),
        'user_'
    );

    $tmpl->displayParsedTemplate();

    $tmpl->dump();
