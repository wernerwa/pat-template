<?PHP
/**
 * patTemplate function that calculates the current time
 * or any other time and returns it in the specified format.
 *
 * $Id: Time.php 454 2007-05-30 15:34:37Z gerd $
 *
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */

/**
 * patTemplate function that calculates the current time
 * or any other time and returns it in the specified format.
 *
 * $Id: Time.php 454 2007-05-30 15:34:37Z gerd $
 *
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_Function_Time extends patTemplate_Function
{
   /**
	* name of the function
	* @access	private
	* @var		string
	*/
	var $_name	=	'Time';

	/**
	 * Overridden because the time should not be calculated at compile time but at runtime
	 *
	 * @var integer
	 */
	var $_type  =   PATTEMPLATE_FUNCTION_RUNTIME;
	
   /**
	* call the function
	*
	* @access	public
	* @param	array	parameters of the function (= attributes of the tag)
	* @param	string	content of the tag
	* @return	string	content to insert into the template
	*/ 
	function call( $params, $content )
	{
		if( !empty( $content ) )
		{
			$params['time'] = $content;
		}
		
		if( isset( $params['time'] ) )
		{
			$params['time'] = strtotime( $params['time'] );
		}
		else
		{
			$params['time'] = time();
		}
		
		
		return date( $params['format'], $params['time'] );
	}
}
?>