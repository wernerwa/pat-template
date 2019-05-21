<?php
/**
 * Example that shows the use of input filters
 *
 * Input filters are applied to the input stream, before
 * they are accessed by the reader. You may use them to strip
 * HMTL comments, so the reader has less data to process.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate::applyInputFilter()
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
     * you may apply as many filters as you like in
     * the filter chain
     */
    $tmpl->applyInputFilter('StripComments');

    $tmpl->readTemplatesFromInput('example_filter_input_stripcomments.tmpl');

    $tmpl->dump();
