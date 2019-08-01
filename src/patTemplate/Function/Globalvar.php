<?php
/**
 * patTemplate function that enables adding global variables
 * from within a template.
 *
 * @package     patTemplate
 * @subpackage  Functions
 * @author      Sebastian Mordziol <argh@php-tools.net>
 * @author      Stephan Schmidt <schst@php.net>
 */

/**
 * patTemplate function that enables adding global variables
 * from within a template.
 *
 * Available attributes:
 *
 * name     >  name of the variable
 * default  >  default value of the variable
 * hidden   >  whether to output the content of the variable: yes|no
 *
 * @package     patTemplate
 * @subpackage  Functions
 * @author      Sebastian Mordziol <argh@php-tools.net>
 * @author      Stephan Schmidt <schst@php.net>
 */
class patTemplate_Function_Globalvar extends patTemplate_Function
{
    /**
     * name of the function
     * @access   private
     * @var      string
     */
    public $_name = 'Globalvar';

    /**
     * reference to the patTemplate object that instantiated the module
     *
     * @access   protected
     * @var  object
     */
    public $_tmpl;

    /**
     * set a reference to the patTemplate object that instantiated the reader
     *
     * @access   public
     * @param    object      patTemplate object
     */
    public function setTemplateReference(&$tmpl)
    {
        $this->_tmpl        =   &$tmpl;
    }

    /**
     * call the function
     *
     * @access   public
     * @param    array   parameters of the function (= attributes of the tag)
     * @param    string  content of the tag
     * @return   string  content to insert into the template
     */
    public function call($params, $content)
    {
        if (isset($params['default'])) {
            $this->_tmpl->addGlobalVar($params['name'], $params['default']);
        }

        if (!isset($params['hidden'])) {
            $params['hidden'] = 'no';
        }

        if ($params['hidden'] != 'yes') {
            return $this->_tmpl->getOption('startTag').strtoupper($params['name']).$this->_tmpl->getOption('endTag');
        }

        return '';
    }
}
