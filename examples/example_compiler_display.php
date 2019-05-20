<?PHP
/**
 * patTemplate example that shows how global variables
 * can be added.
 *
 * Global Variables will be replaced in all templates that
 * are loaded.
 *
 * You may add a global and a local variable with the same
 * name, but as globals are replaced after locals, you
 * will see the value of the local var.
 *
 * $Id: example_compiler_display.php 201 2004-05-10 19:54:57Z schst $
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

   /**
	* compiler
	*/
	require_once '../patTemplate/Compiler.php';

	
	$tmpl	=	&new patTemplate_Compiler();
	$tmpl->setRoot( 'templates' );

	$tmpl->setOption( 'compileFolder', 'compiledTemplates' );

	$tmpl->readTemplatesFromInput( 'example_compiler_display.tmpl' );

	$tmpl->compile( 'example1.php' );
	
	$tmpl->addGlobalVar( 'GLOBAL', 'I\'m global.' );

	$tmpl->addVar( 'template2', 'schst', array( 'one', 'two', 'repeat it.' ) );
	
	$tmpl->addVar( 'template1', 'argh', array( 'one', 'two', 'repeat it.' ) );
	
	$tmpl->addVars( 'template1', array(
										'foo' => 'This is a string',
										'bar' => 453
									)
				 );

	/**
	 * standard template and dependencies
	 */
	echo '<fieldset><legend>template1</legend>';
	$tmpl->displayParsedTemplate( 'template1' );
	echo '</fieldset><br />';

	/**
	 * modulo
	 */
	echo '<fieldset><legend>template3</legend>';
	$tmpl->addVar( 'template3', 'argh', array( 'one', 'two', 'repeat it.' ) );
	$tmpl->displayParsedTemplate( 'template3' );
	echo '</fieldset><br />';

	/**
	 * simplecondition
	 */
	echo '<fieldset><legend>template4</legend>';
	$tmpl->addVar( 'template4', 'FOO', 'set' );
	$tmpl->displayParsedTemplate( 'template4' );
	echo '</fieldset><br />';

	/**
	 * condition
	 */
	echo '<fieldset><legend>template5</legend>';
	$tmpl->addVar( 'template5', 'condVar', array( 'foo', 'bar' ) );
	$tmpl->displayParsedTemplate( 'template5' );
	echo '</fieldset><br />';
?>