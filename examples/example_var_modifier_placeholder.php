<?PHP
/**
 * Example that shows the use of variable modifiers
 *
 * patTemplate allows you to use any PHP function as
 * a variable modifier.
 * Furthermore, you may create custom modifiers, see
 * extending-pattemplate.txt for more information.
 *
 * $Id: example_var_modifier_placeholder.php 446 2006-10-24 14:28:25Z gerd $
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
	require_once( '/home/gschaufelberger/public_html/pat/patError/patErrorManager.php' );
	
   /**
	* main class
	*/
	require_once '../patTemplate.php';
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );

	$tmpl->readTemplatesFromInput( 'example_var_modifier_placeholder.tmpl' );

	$tmpl->addVar( 'page', 'length', 30 );
    $tmpl->addVar( 'page', 'suffix', '<strong title="local variables override global ones...">local suffix</strong>' );

    $tmpl->addGlobalVar( 'prefix', '<b>global prefix</b>' );
    $tmpl->addGlobalVar( 'suffix', '<b>global suffix</b>' );

	$tmpl->addVar( 'page', 'text', 'This text is way too long! This text is way too long! This text is way too long! This text is way too long!' );


	$tmpl->displayParsedTemplate();
?>