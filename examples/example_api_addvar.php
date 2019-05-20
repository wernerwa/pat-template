<?PHP
/**
 * patTemplate example that displays the
 * usage of parseIntoVar()
 *
 * $Id: example_api_addvar.php 155 2004-04-20 20:16:43Z schst $
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
	require_once( 'pat/patErrorManager.php' );
	
   /**
	* main class
	*/
	require_once '../patTemplate.php';
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );
	$tmpl->readTemplatesFromInput( 'example_api_addvar.tmpl' );
	
	$tmpl->addVar( 'template1', 'argh', array( 'one', 'two', 'repeat it.' ) );
	
	$tmpl->addVars( 'template1', array(
										'foo' => 'This is a string',
										'bar' => 453
									)
				 );
	
	$tmpl->displayParsedTemplate();
?>