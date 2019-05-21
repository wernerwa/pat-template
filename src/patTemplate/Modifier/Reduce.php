<?php

/**
 * patTemplate modifier Reduce
 *
 * Reduce a string variable to a fixed length showing the string´s beggining and end
 *
 * Possible attributes are:
 * - length (integer)
 * - afix (string) the chars inserted between the beginning and the end of the string
 *
 * @package     patTemplate
 * @subpackage  Modifiers
 * @author      David Blanco <dablanco@gmail.com>
 */
class patTemplate_Modifier_Reduce extends patTemplate_Modifier
{

   /**
    * modify the value
    *
    * @access  public
    * @param  string    value
    * @return  string    modified value
    */
    public function modify($value, $params = array())
    {
        // length
        if (!isset($params['length'])) {
            return $value;
        }
        settype($params['length'], 'integer');

        // check if it´s needed to reduce the string
        if (strlen($value) <= $params['length']) {
            return $value;
        }

        // afix (the string between string´s beginning and end parts)
        if (isset($params['afix'])) {
            $afix = $params['afix'];
        } else {
            $afix = '...';
        }

        // length of the afix
        $reservedBytes = strlen($afix);

        // bytes available for beginning and end
        $bytesAvailable = $params['length'] - $reservedBytes;

        // beginning and end parts themselves :)
        $begin = substr($value, 0, floor($bytesAvailable / 2));
        $end = substr($value, 0 - (floor($bytesAvailable / 2)));

        // return value
        return sprintf("%s%s%s", $begin, $afix, $end);
    }
}
