<?php
/**
 * patTemplate example that shows how to create a list
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




    $list   =   array(
                        array( 'superhero' => 'Superman', 'realname' => 'Clark Kent' ),
                        array( 'superhero' => 'Batman', 'realname' => 'Bruce Wayne' ),
                        array( 'superhero' => 'Aquaman', 'realname' => 'Arthur Curry' ),
                    );


    $tmpl = new patTemplate();
    $tmpl->setRoot('templates');

    $tmpl->readTemplatesFromInput('example_realworld_list.tmpl');

    $tmpl->addRows('list_entry', $list);
    $tmpl->displayParsedTemplate();
