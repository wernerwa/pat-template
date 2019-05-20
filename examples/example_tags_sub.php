<?PHP
/**
 * Example that shows the use of the sub tag
 *
 * The sub tag is used, when it comes to condition templates. It splits a
 * template into smaller parts, that are addressedwith the same name.
 *
 * Which part is displayed, depends on the condition you specified.
 *
 * $Id: example_tags_sub.php 155 2004-04-20 20:16:43Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_tags_sub.tmpl' );

	$tmpl->displayParsedTemplate();
?>