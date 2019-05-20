<?php
/**
 * Base class for patTemplate functions
 *
 * $Id: Function.php 219 2004-05-25 20:38:38Z schst $
 *
 * @package     patTemplate
 * @subpackage  Functions
 * @author      Stephan Schmidt <schst@php.net>
 */

/**
 * Base class for patTemplate functions
 *
 * $Id: Function.php 219 2004-05-25 20:38:38Z schst $
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
     * @access private
     * @var    object
     */
    public $_reader;
    
    /**
     * set the reference to the reader object
     *
     * @access   public
     * @param    object patTemplate_Reader
     */
    public function setReader(&$reader)
    {
        $this->_reader = &$reader;
    }

    /**
     * call the function
     *
     * @abstract
     * @access   public
     * @param    array   parameters of the function (= attributes of the tag)
     * @param    string  content of the tag
     * @return   string  content to insert into the template
     */
    public function call($params, $content)
    {
    }
}
