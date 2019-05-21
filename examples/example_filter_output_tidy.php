<?php
/**
 * Example that shows the use of output filters
 *
 * $Id: example_filter_output_tidy.php 453 2007-05-30 12:58:43Z gerd $
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




    $tmpl   =   &new patTemplate();
    $tmpl->setRoot('templates');

    /**
     * apply the tidy filter
     */
    $options = array(
                        'output-xhtml' => true,
                        'clean'        => true
                    );
    $tmpl->applyOutputFilter('Tidy', $options);

    $tmpl->readTemplatesFromInput('example_filter_output_tidy.tmpl');

    $tmpl->displayParsedTemplate();
