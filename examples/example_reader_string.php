<?PHP
/**
 * Example that uses the String reader instead
 * of the default file reader.
 *
 * The String Reader allows you to read templates from any variable by passing
 * it a string. You can always use this to read from a custom source.
 *
 * $Id: example_reader_string.php 181 2004-04-23 22:01:02Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.de
 */

 	error_reporting( E_ALL );
 
   /**
	* requires patErrorManager
	* make sure that it is in your include path
	*/
	require_once( "pat/patErrorManager.php" );
	
   /**
	* main class
	*/
	require_once '../patTemplate.php';
	
	$tmpl	=	&new patTemplate( 'html' );
	
	$string = '<patTemplate:tmpl name="string">This template has been parsed from a string <patTemplate:tmpl name="too">, as well as this.</patTemplate:tmpl></patTemplate:tmpl>';
	
	$tmpl->readTemplatesFromInput( $string, 'String' );

	$tmpl->dump();
?>