<?PHP
/**
 * patTemplate example that uses the reserved word '__parent'
 * as a varscope
 *
 * $Id: example_realworld_varscopeparent.php 453 2007-05-30 12:58:43Z gerd $
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
	$tmpl->readTemplatesFromInput( 'example_realworld_varscopeparent.tmpl' );
	
	$tmpl->addVar( 'table', 'VAR', 'It worked!' );
	$tmpl->displayParsedTemplate();
?>
