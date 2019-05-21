<?php
/**
 * patTemplate example that shows how variables
 * may copy their value from any other variable.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.de
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

    $tmpl->readTemplatesFromInput('example_var_global.tmpl');

    $tmpl->addGlobalVar('sometext', 'This will be overwritten');
    $tmpl->addGlobalVar('globaltext', 'This will NOT be overwritten
Just because no one does it...
');

    $tmpl->addVar('page', 'sometext', 'This text
contains
some
line
breaks.');

    $tmpl->addVar('repeating', 'value', array( 'une', 'deux', 'trois' ));
    $tmpl->addVar('non-repeating', 'scalar', 'Copy');

    $tmpl->displayParsedTemplate();
