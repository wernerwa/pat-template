<?php
/**
 * patTemplate StripComments input filter
 *
 * Will remove all HTML comments.
 *
 * @package     patTemplate
 * @subpackage  Filters
 * @author      Stephan Schmidt <schst@php.net>
 */

/**
 * patTemplate StripComments output filter
 *
 * Will remove all HTML comments.
 *
 * @package     patTemplate
 * @subpackage  Filters
 * @author      Stephan Schmidt <schst@php.net>
 */
class patTemplate_InputFilter_StripComments extends patTemplate_InputFilter
{
    /**
     * filter name
     *
     * @access   protected
     * @abstract
     * @var  string
     */
    public $_name  =   'StripComments';

    /**
     * compress the data
     *
     * @access   public
     * @param    string      data
     * @return   string      data without whitespace
     */
    public function apply($data)
    {
        $data = preg_replace('°<!--.*-->°msU', '', $data);
        $data = preg_replace('°/\*.*\*/°msU', '', $data);

        return $data;
    }
}
