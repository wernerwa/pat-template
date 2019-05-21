<?php
/**
 * patTemplate modfifier Sizeformat
 *
 * @package     patTemplate
 * @subpackage  Modifiers
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 */

/**
 * patTemplate modfifier Sizeformat
 *
 * Transform file size in bytes to Kilo, Mega Giga or Tera byte.
 *
 * @package     patTemplate
 * @subpackage  Modifiers
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 */
class patTemplate_Modifier_Sizeformat extends patTemplate_Modifier
{
    public $defaults = array(
                        'multi'     => 'auto',
                        'decimals'  => 0,
                        'point'     => '.',
                        'separator' => ','
                    );
    /**
    * modify the value
    *
    * @access   public
    * @param    string      value
    * @return   string      modified value
    */
    public function modify($value, $params = array())
    {
        $multi  =   1024;

        $params             =   array_merge($this->defaults, $params);
        $params['multi']    =   strtolower($params['multi']);
        $params['decimals'] =   intval($params['decimals']);
        $value              =   floatval($value);

        /*
         * calculate automatically
         */
        $suffix             =   array('k', 'M', 'G', 'T');
        if ($params['multi'] == 'auto') {
            $s  =   '';
            while ($value > $multi && !empty($suffix)) {
                $s  =   array_shift($suffix);
                $value  /=  $multi;
            }
            return @number_format($value, $params['decimals'], $params['point'], $params['separator']) . ' ' . $s;
        }

        /*
         * use well defined suffix
         */
        $suffix =   false;
        switch ($params['multi']) {
            case 't':
                $suffix =   'T';
                $multi  *=  1024;
                // no break
            case 'g':
                if (!$suffix) {
                    $suffix =   'G';
                }
                $multi  *=  1024;
                // no break
            case 'm':
                if (!$suffix) {
                    $suffix =   'M';
                }
                $multi  *=  1024;
                // no break
            case 'k':
                if (!$suffix) {
                    $suffix =   'k';
                }
                break;

            default:
                break;
        }

        $value  /=  $multi;
        return @number_format($value, $params['decimals'], $params['point'], $params['separator']) . ' ' . $suffix;
    }
}
