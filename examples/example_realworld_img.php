<?PHP
/**
 * Example that shows the use of variable modifiers
 *
 * This is an example of a variable modifier that is used to create HTML
 * image tags and automatically includes the width and height of the
 * specified image.
 *
 * $Id: example_realworld_img.php 161 2004-04-20 21:17:47Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_realworld_img.tmpl' );

	$tmpl->addVar( 'page', 'image_src', 'img/pb_pattemplate.gif' );

	$tmpl->displayParsedTemplate();
?>