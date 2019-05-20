<?PHP
/**
 * patTemplate modulo example
 *
 * A modulo template allows you to define any number of sub-templates
 * for alternating lists. It is similar to odd-even templates.
 *
 * $Id: example_type_modulo.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.de
 */

    /**
     * Main examples prepend file, needed *only* for the examples framework!
     */
    include_once 'patExampleGen/prepend.php';

    // EXAMPLE START ------------------------------------------------------

    /**
     * patErrorManager class
     */
    require_once $neededFiles['patErrorManager'];

    /**
     * patTemplate
     */
    require_once $neededFiles['patTemplate'];



	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );
	$tmpl->readTemplatesFromInput( 'example_type_modulo.tmpl' );
	
	$tmpl->addVar( 'row', 'value', array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten' ) );
	
	$tmpl->displayParsedTemplate( 'row' );
?>
