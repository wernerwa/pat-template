<?PHP
/**
 * Example for an oddEven template
 *
 * An odd-even template allows you to define two sub-templates for alternating lists.
 *
 * $Id: example_type_standard.php 155 2004-04-20 20:16:43Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_type_standard.tmpl' );
	
	$tmpl->addVar( 'row', 'value', array( 'one', 'two', 'three', 'four', 'five' ) );

	$tmpl->displayParsedTemplate( 'row' );
?>