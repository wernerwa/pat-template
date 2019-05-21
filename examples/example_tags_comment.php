<?php
/**
 * Example that shows the use of the comment tag
 *
 * The comment tag allows you to include documentation
 * of your templates or HTML files that will not be displayed
 * to the end user in the browser.
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

    $tmpl->readTemplatesFromInput('example_tags_comment.tmpl');

    $list   =   array(
                        array( 'superhero' => 'Superman', 'realname' => 'Clark Kent' ),
                        array( 'superhero' => 'Batman', 'realname' => 'Bruce Wayne' ),
                        array( 'superhero' => 'Aquaman', 'realname' => 'Arthur Curry' ),
                    );
    $tmpl->addRows('list_entry', $list);

    $tmpl->displayParsedTemplate();
