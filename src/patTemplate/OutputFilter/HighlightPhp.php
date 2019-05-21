<?php
/**
 * patTemplate HighlightPHP filter
 *
 * Highlights PHP code in the output.
 *
 * @package     patTemplate
 * @subpackage  Filters
 * @author      Stephan Schmidt <schst@php.net>
 */

/**
 * patTemplate HighlightPHP filter
 *
 * Highlights PHP code in the output.
 *
 * @package     patTemplate
 * @subpackage  Filters
 * @author      Stephan Schmidt <schst@php.net>
 */
class patTemplate_OutputFilter_HighlightPhp extends patTemplate_OutputFilter
{
    /**
     * filter name
     *
     * @access   protected
     * @abstract
     * @var  string
     */
    public $_name  =   'HighlightPhp';

    /**
     * remove all whitespace from the output
     *
     * @access   public
     * @param    string      data
     * @return   string      data without whitespace
     */
    public function apply($data)
    {
        return highlight_string($data, true);
    }
}
