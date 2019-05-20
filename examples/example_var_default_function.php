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
 * A method of this class will be
 * called to calculate the default
 * value of a variable
 */
 class Foo {
     function bar() {
         return "tomato";
     }
 }

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

	$tmpl->setOption('allowFunctionsAsDefault', true);

	$tmpl->readTemplatesFromInput( 'example_var_default_function.tmpl' );

	$tmpl->displayParsedTemplate();
?>