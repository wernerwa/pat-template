<?PHP
/**
 * patTemplate example that shows how system variables
 * can be used
 *
 * System variables are automatically added by patTemplate,
 * if you set the attribute addSystemVars="...".
 *
 * Systemvars include:
 * - {PAT_LOOPS}
 * - {PAT_IS_FIRST}
 * - {PAT_IS_LAST}
 * - {PAT_IS_ODD}
 * - {PAT_IS_EVEN}
 * - {PATTEMPLATE_VERSION}
 *
 * You may set the attribute to one of the following values:
 *
 * - boolean => use true/false
 * - int => use 1/0
 * - any other value => use the value you specified or empty
 *
 * The variable {PAT_ROW_VAR} is always available,
 * independent from the addSystemVars attribute.
 *
 * $Id: example_attributes_addsystemvars.php 278 2004-09-04 14:25:45Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_attributes_addsystemvars.tmpl' );

	$tmpl->addVar( 'tmpl-1', 'dummy', array( 'one', 'two', 'three', 'four', 'five' ) );
	$tmpl->addVar( 'tmpl-2', 'dummy', array( 'one', 'two', 'three', 'four', 'five' ) );
	$tmpl->addVar( 'tmpl-3', 'dummy', array( 'one', 'two', 'three', 'four', 'five' ) );
	
	$tmpl->displayParsedTemplate('page');

?>