<?PHP
/**
 * patTemplate example that shows how to use template functions
 * 
 * This example uses the autoload feature of the 'Call' function
 * which will allow you to dynamically load the components whenever
 * they are needed.
 *
 * $Id: example_function_call_autoload.php 320 2004-10-28 15:07:07Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see			patTemplate_Function
 */

 	error_reporting( E_ALL );
 
   /**
	* requires patErrorManager
	* make sure that it is in your include path
	*/
	require_once( 'pat/patErrorManager.php' );

   /**
	* main class
	*/
	require_once '../patTemplate.php';
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );
	$tmpl->setOption( 'componentFolder', 'components' );
	$tmpl->setOption( 'componentExtension', 'tmpl' );

	$tmpl->readTemplatesFromInput( 'example_function_call.tmpl' );

	$tmpl->displayParsedTemplate( 'page' );
?>