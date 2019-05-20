<?PHP
/**
 * patTemplate example that displays the
 * usage of parseIntoVar()
 *
 * $Id: example_api_addobject.php 347 2004-12-31 13:51:45Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_api_addobject.tmpl' );

	$obj = new stdClass;
	$obj->name    = 'Frank';
	$obj->surname = 'Castle';
	$obj->age     = 45;
	
	$tmpl->addObject( 'page', $obj, 'obj_' );

	$obj2 = new stdClass;
	$obj2->name    = 'Clark';
	$obj2->surname = 'Kent';
	$obj2->age     = 'unknown';
	
	$obj3 = new stdClass;
	$obj3->name    = 'Oliver';
	$obj3->surname = 'Queen';
	$obj3->age     = '35';

	$tmpl->addObject( 'row', array( $obj, $obj2, $obj3 ), 'obj2_' );
	
	$tmpl->displayParsedTemplate();

	$tmpl->freeAllTemplates();

	$tmpl->readTemplatesFromInput( 'example_api_addobject.tmpl' );

	$obj4 = new stdClass;
	$obj4->name    = 'Oliver';
	$obj4->surname = 'Queen';
	$obj4->age      = '35';
	$obj4->_private = new stdClass();
	$obj4->_private->bar = 'foo';
	
	// the fourth parameter tells patTemplate to ignore properties that start with an underscore
	$tmpl->addObject( 'page', $obj4, 'obj_', true );
	$tmpl->displayParsedTemplate();
?>