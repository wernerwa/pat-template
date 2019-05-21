<?php
/**
 * Example that shows the use of output filters
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

    $tmpl->readTemplatesFromInput('example_filter_output_per_template.tmpl');

    /**
     * apply the bbcode filter to one template
     */
    $options = array(
                        'reader' => 'AutoFile',
                        'skinDir' => './BBCode'
                    );
    $tmpl->applyOutputFilter('BBCode', $options, 'bbcode');

    $tmpl->displayParsedTemplate();
