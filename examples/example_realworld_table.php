<?PHP
/**
 * patTemplate example that creates a table from a
 * two dimensional array
 *
 * $Id: example_realworld_table.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
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
	$tmpl->readTemplatesFromInput( 'example_realworld_table.tmpl' );
	
	$rows = array(
					array( '<Col 1>', '<Col 2>', '<Col 3>' ),
					array( '1-1', '1-2', '1-3' ),
					array( '2-1', '2-2', '2-3' ),
					array( '3-1', '3-2', '3-3' ),
					array( '4-1', '4-2', '4-3' ),
				);

	$tmpl->addVar( 'row', 'value', $rows );
	$tmpl->displayParsedTemplate();
?>
