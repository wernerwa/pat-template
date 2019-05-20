<?PHP
/**
 * Example that shows the use of variable modifiers
 *
 * patTemplate allows you to use any PHP function as
 * a variable modifier.
 * Furthermore, you may create custom modifiers, see
 * extending-pattemplate.txt for more information.
 *
 * $Id: example_var_modifier.php 297 2004-10-03 11:35:57Z gerd $
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

	$tmpl->readTemplatesFromInput( 'example_var_modifier_multiple.tmpl' );

	$tmpl->addVar('page', 'multiline', 'This contains
 some
 line
 breaks and some special chars like < and >...');

	$tmpl->displayParsedTemplate();
?>