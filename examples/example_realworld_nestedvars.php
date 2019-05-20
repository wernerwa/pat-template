<?PHP
/**
 * patTemplate example that uses nested variables
 *
 * $Id: example_realworld_nestedvars.php 276 2004-09-04 14:08:18Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see			patTemplate::addGlobalVar()
 * @see			patTemplate::addGlobalVars()
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

	$tmpl->readTemplatesFromInput( 'example_realworld_nestedvars.tmpl' );

	$tmpl->addGlobalVar('name', 'Stephan');
	$tmpl->addGlobalVar('surname', 'Schmidt');
	
	$tmpl->addVar('root', 'fullname', '{NAME} {SURNAME}' );
	
	$tmpl->displayParsedTemplate('root');
?>