<?PHP
/**
 * patTemplate example that displays the
 * usage of parseIntoVar()
 *
 * $Id: example_api_parseintovar.php 259 2004-08-10 19:44:17Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_api_parseintovar.tmpl' );
	
	$tmpl->addVar( 'src', 'foo', 'tomato' );
	$tmpl->parseIntoVar( 'src', 'dest', 'BAR' );

	$tmpl->clearTemplate( 'src' );
	$tmpl->addVar( 'src', 'foo', 'coconut' );
	$tmpl->parseIntoVar( 'src', 'dest', 'BAR',true );

	
	$tmpl->displayParsedTemplate();
?>