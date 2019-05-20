<?PHP
/**
 * patTemplate example that creates a table from a
 * two dimensional array
 *
 * $Id: example_realworld_table.php 158 2004-04-20 20:58:43Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_realworld_table.tmpl' );
	
	$rows = array(
					array( '<Col 1>', '<Col 2>', '<Col 3>' ),
					array( '1-1', '1-2', '1-3' ),
					array( '2-1', '2-2', '2-3' ),
					array( '3-1', '3-2', '3-3' ),
					array( '4-1', '4-2', '4-3' ),
				);

	$tmpl->addVar( 'row', 'value', $rows );
	$tmpl->displayParsedTemplate();
?>