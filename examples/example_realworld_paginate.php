<?php
/**
 * patTemplate example that demonstrates how to build paginated
 * result sets from any database resultset.
 *
 * This is not very fast, but shows what patTemplate is capable
 * of, although it was never designed for this.
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
    $tmpl->readTemplatesFromInput('example_realworld_paginate.tmpl');

    /**
     * this simulates the database resultset
     */
    $rows = array(
                    array( 'name' => 'Superman', 'realname' => 'Clark Kent' ),
                    array( 'name' => 'Batman', 'realname' => 'Bruce Wayne' ),
                    array( 'name' => 'Aquaman', 'realname' => 'Arthur Curry' ),
                    array( 'name' => 'Wonder Woman', 'realname' => 'Diana Price' ),
                    array( 'name' => 'The Flash', 'realname' => 'Wally West' ),
                    array( 'name' => 'Green Lantern', 'realname' => 'Kyle Rayner' ),
                    array( 'name' => 'The Atom', 'realname' => 'Ray Palmer' ),
                );

    /**
     * set the number of entries on a page
     */
    $entriesPerPage = 3;

    /**
     * get the starting entries from the GET variables or set it
     * to zero by default
     */
    $start = 0;
    if (isset($_GET['start'])) {
        $start = $_GET['start'] - 1;
    }

    /**
     * template needs to know the script url
     */
    $tmpl->addGlobalVar('script', $_SERVER['PHP_SELF']);

    /**
     * add the result set to the rows
     */
    $tmpl->addRows('row', $rows);
    /**
     * limit the rows
     */
    $tmpl->setAttribute('row', 'limit', $start.','.$entriesPerPage);

    /**
     * and here's the strange stuff:
     *
     * We add the result set to another template, which will generate the
     * links to all pages. The template is a modulo template, but contains
     * only one subtemplate.
     *
     * We define the number of different subtemplates by setting the modulo
     * attribute. If set to 3, there are three subtemplates: 1,2 and 3. As we
     * only define subtemplate '1', then only every third template is displayed.
     */
    $tmpl->addRows('pages', $rows);
    $tmpl->setAttribute('pages', 'modulo', $entriesPerPage);

    $tmpl->displayParsedTemplate();
