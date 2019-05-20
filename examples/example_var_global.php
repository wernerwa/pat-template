<?PHP
/**
 * patTemplate example that shows how variables
 * may copy their value from any other variable.
 *
 * $Id: example_var_global.php 295 2004-10-02 14:01:15Z gerd $
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

	$tmpl->readTemplatesFromInput( 'example_var_global.tmpl' );
	
	$tmpl->addGlobalVar( 'sometext', 'This will be overwritten' );
	$tmpl->addGlobalVar( 'globaltext', 'This will NOT be overwritten
Just because no one does it...
' );

	$tmpl->addVar( 'page', 'sometext', 'This text
contains
some
line
breaks.' );

	$tmpl->addVar( 'repeating', 'value', array( 'une', 'deux', 'trois' ) );
	$tmpl->addVar( 'non-repeating', 'scalar', 'Copy' );
	
	$tmpl->displayParsedTemplate();
?>