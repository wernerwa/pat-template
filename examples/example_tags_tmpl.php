<?PHP
/**
 * Example that shows the use of the tmpl tag
 *
 * The template tag is the most important tag.
 * It allows you to split your file into smaller parts.
 *
 * $Id: example_tags_tmpl.php 155 2004-04-20 20:16:43Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_tags_tmpl.tmpl' );

	$tmpl->displayParsedTemplate( 'template1' );

	$tmpl->displayParsedTemplate( 'template2' );
?>