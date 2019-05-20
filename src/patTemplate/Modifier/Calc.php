<?php
/**
 * patTemplate modfifier Calculator
 *
 * $Id: Calc.php 473 2008-12-01 10:56:22Z gerd $
 *
 * @package     patTemplate
 * @package     Modifiers
 * @author      Axel Sauerhöfer <axel@willcodejoomlaforfood.de>
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 * @author      Timo Holzherr <timo@holzherr.de>
 */

/**
 * patTemplate modifier Calculator
 *
 * Perfom simple mathematic operations like + - * /
 *
 * Example:
 *
 * Declare variable a with default value 10 and perform + operation.
 * With the memory parameter you can specify diffrent buffers. If no memory
 * parameter isset, the operation will be performend on default memory.
 *
 * <patTemplate:var default="10" name="a" modifier="calc" operator="+" memory="axel"/>
 * <patTemplate:var default="5" name="b" modifier="calc" operator="+" memory="axel"/>
 * <patTemplate:var default="5" name="sum" modifier="calc" operator="=" memory="axel"/>
 *
 * If you dont specify a default value it is improtant that the variable is
 * assigned in your php code like this:
 *           $tmpl->AddVar( 'page', 'a', 9 )
 *
 * If you don't setup a default value and don't assign a variable the modifier
 * wouldn't be called.
 *
 * Available operators are:
 *
 * +    Addition
 * -    Subtraction
 * *    Multiplication
 * /    Division
 * c    Clear the buffer
 * sig  Return the sign (1 for positive values, 0 for 0, -1 for netagive nums)
 * abs  Return the absolute value of the number
 *
 * @package     patTemplate
 * @package     Modifiers
 */
class patTemplate_Modifier_Calc extends patTemplate_Modifier
{
   /**
    * modify the value
    *
    * @access   public
    * @param    string      value
    * @return   string      modified value
    */
    function modify( $value, $params = array() )
    {
        $precision  =   0;
        if( isset( $params['precision'] ) ) {
            $precision   =   intval( $params['precision'] );
        }
        static $buffer = array();

        if( !is_numeric( $value ) ) {
            return $value;
        }

        if( !isset( $params['operator'] ) ) {
            return $value;
        }

        $memory = '__default';
        if( isset( $params['memory'] ) ) {
            $memory =   $params['memory'];
        }

        if( !isset( $buffer[$memory] ) ) {
            $buffer[$memory] = 0;
        }

        switch( $params['operator'] ) {
            case '+';
                $buffer[$memory] += $value;
                break;

            case '-';
                $buffer[$memory] -= $value;
                break;

            case '*';
                $buffer[$memory] *= $value;
                break;

            case '/';
                $buffer[$memory] /= $value;
                break;

            case '=':
                return number_format( $buffer[$memory], $precision );
                break;

            case 'c':
                $buffer[$memory] = 0 ;
                return null;
                break;
            case 'sig':
                if( $buffer[$memory] > 0 ) {
                     return 1;
                }
                if( $buffer[$memory] < 0 ) {
                    return -1;
                }
                return 0;
            case 'abs':
                return abs( $buffer[$memory] );
        }

        return number_format( $value, $precision );
    }
}
?>
