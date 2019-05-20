<?PHP
/**
 * patTemplate example that shows how variables
 * may copy their value from any other variable.
 *
 * $Id: example_var_copyfrom.php 262 2004-08-10 20:30:45Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_var_copyfrom.tmpl' );

	$tmpl->addVar( 'page', 'sometext', 'This text
contains
some
line
breaks.' );

	$tmpl->addVar( 'repeating', 'value', array( 'une', 'deux', 'trois' ) );
	$tmpl->addVar( 'non-repeating', 'scalar', 'Copy' );
	
	$tmpl->displayParsedTemplate();
?>