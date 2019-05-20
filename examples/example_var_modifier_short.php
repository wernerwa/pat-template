<?PHP
/**
 * Example that shows the use of variable modifiers
 *
 * patTemplate allows you to use any PHP function as
 * a variable modifier.
 * Furthermore, you may create custom modifiers, see
 * extending-pattemplate.txt for more information.
 *
 * $Id: example_var_modifier_short.php 409 2005-08-01 08:10:52Z schst $
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
	$tmpl->setRoot('templates');

	$tmpl->applyInputFilter('ShortModifiers');
	
	// If you set 'copyVars' to false, you may only apply one modifier to
	// a variable, but this way it is faster.
//	$tmpl->applyInputFilter('ShortModifiers', array('copyVars' => false));
	
	$tmpl->readTemplatesFromInput( 'example_var_modifier_short.tmpl' );

	$tmpl->addVar('page', 'now', time());
	
	$tmpl->addVar( 'page', 'sometext', 'This contains some special chars: < > & äÖÜ' );

	$tmpl->addVar( 'page', 'multiline', 'This contains
 some
 line
 breaks...' );

	$tmpl->displayParsedTemplate();
?>