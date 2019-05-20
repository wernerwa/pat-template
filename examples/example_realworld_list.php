<?PHP
/**
 * patTemplate example that shows how to create a list
 *
 * $Id: example_realworld_list.php 163 2004-04-20 21:31:05Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 */

 	error_reporting( E_ALL );

	$list	=	array(
						array( 'superhero' => 'Superman', 'realname' => 'Clark Kent' ),
						array( 'superhero' => 'Batman', 'realname' => 'Bruce Wayne' ),
						array( 'superhero' => 'Aquaman', 'realname' => 'Arthur Curry' ),
					);
 
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

	$tmpl->readTemplatesFromInput( 'example_realworld_list.tmpl' );

	$tmpl->addRows( 'list_entry', $list );	
	$tmpl->displayParsedTemplate();
?>