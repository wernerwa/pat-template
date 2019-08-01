<?php
/**
 * patTemplate BBCode output filter
 *
 * Uses patBBCode.
 *
 * @package     patTemplate
 * @subpackage  Filters
 * @author      Stephan Schmidt <schst@php.net>
 */

/**
 * patTemplate BBCode output filter
 *
 * Uses patBBCode.
 *
 * @package     patTemplate
 * @subpackage  Filters
 * @author      Stephan Schmidt <schst@php.net>
 */
class patTemplate_OutputFilter_BBCode extends patTemplate_OutputFilter
{
    /**
     * filter name
     *
     * @access   protected
     * @abstract
     * @var  string
     */
    public $_name  =   'BBCode';

    /**
     * BBCode parser
     *
     * @access   private
     * @var      object patBBCode
     */
    public $BBCode = null;

    /**
     * remove all whitespace from the output
     *
     * @access   public
     * @param    string      data
     * @return   string      data without whitespace
     */
    public function apply($data)
    {
        if (!$this->_prepare()) {
            return $data;
        }

        $data = $this->BBCode->parseString($data);

        return $data;
    }

    /**
     * prepare BBCode object
     *
     * @access   private
     */
    public function _prepare()
    {
        if (is_object($this->BBCode)) {
            return true;
        }
        if (!class_exists('patBBCode')) {
            if (!@include_once 'pat/patBBCode.php') {
                return false;
            }
        }

        $this->BBCode = new patBBCode();

        if (isset($this->_params['skinDir'])) {
            $this->BBCode->setSkinDir($this->_params['skinDir']);
        }

        $reader =& $this->BBCode->createConfigReader($this->_params['reader']);

        // give patBBCode the reader we just created
        $this->BBCode->setConfigReader($reader);

        return true;
    }
}
