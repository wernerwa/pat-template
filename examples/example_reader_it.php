<?PHP
/**
 * Example that uses the IT reader instead
 * of the default file reader.
 *
 * The IT reader allows you to read templates that have been
 * created to be used with HTML_Template_IT
 *
 * $Id: example_reader_it.php 181 2004-04-23 22:01:02Z schst $
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
	$tmpl->setRoot( 'templates' );

	$data = array 
				( 
					"0" => array("Stig", "Bakken"), 
					"1" => array("Martin", "Jansen"), 
					"2" => array("Alexander", "Merz") 
				); 
	
	$tmpl->readTemplatesFromInput( 'example_reader_it.tmpl', 'IT' );
	$tmpl->addVar( 'row', 'value', $data );
	$tmpl->displayParsedTemplate();
?>