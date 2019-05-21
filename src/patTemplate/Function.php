<?php
/**
 * Base class for patTemplate functions
 *
 * @package     patTemplate
 * @subpackage  Functions
 * @author      Stephan Schmidt <schst@php.net>
 */

/**
 * function is executed, when template is compiled (preg_match)
 */
define('PATTEMPLATE_FUNCTION_COMPILE', 1);

/**
 * function is executed, when template parsed
 */
define('PATTEMPLATE_FUNCTION_RUNTIME', 2);

/**
 * Base class for patTemplate functions
 *
 * @abstract
 * @package     patTemplate
 * @subpackage  Functions
 * @author      Stephan Schmidt <schst@php.net>
 */
class patTemplate_Function extends patTemplate_Module
{
    /**
     * reader object
     *
     * @var    object
     */
    protected $_reader;

    /**
     * function type
     *
     * @access public
     * @var    integer
     */
    public $_type = PATTEMPLATE_FUNCTION_COMPILE;

    /**
     * set the reference to the reader object
     *
     * @param    object patTemplate_Reader
     */
    public function setReader(&$reader)
    {
        $this->_reader = &$reader;
    }

    /**
     * Returns the function type
     *
     * @access public
     * @return integer
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * call the function
     *
     * @abstract
     * @param    array   parameters of the function (= attributes of the tag)
     * @param    string  content of the tag
     * @return   string  content to insert into the template
     */
    public function call($params, $content)
    {
    }
}
