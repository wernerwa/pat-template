<?PHP
/**
 * patTemplate example that creates a table from a
 * two dimensional array
 *
 * $Id: example_realworld_table_from_list.php 226 2004-06-01 21:10:36Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
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
	$tmpl->readTemplatesFromInput( 'example_realworld_table_from_list.tmpl' );
	
	$list = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 );

	$tmpl->addVar( 'cell', 'value', $list );
	$tmpl->addVar( 'cell', 'value2', array_reverse( $list ) );
	$tmpl->displayParsedTemplate();
?>