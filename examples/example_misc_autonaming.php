<?PHP
/**
 * patTemplate example that shows autonaming works.
 *
 * Since version 3.0.0 you do not need to specify a name
 * attribute for your templates, as long as you do not need
 * to access them from PHP.
 *
 * patTemplate will assign them a unique name.
 *
 * $Id: example_misc_autonaming.php 155 2004-04-20 20:16:43Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_misc_autonaming.tmpl' );
	$tmpl->dump();
?>