<?PHP
/**
 * patTemplate example that show how
 * to display debug information about
 * the loaded templates and their variables
 *
 * $Id: example_dump_dhtml.php 453 2007-05-30 12:58:43Z gerd $
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
	$tmpl->readTemplatesFromInput( 'example_dump_dhtml.tmpl' );

	$tmpl->addGlobalVar( 'MyGlobalVar', 'foo' );

	$list	=	array(
						array( 'superhero' => 'Superman', 'realname' => 'Clark Kent' ),
						array( 'superhero' => 'Batman', 'realname' => 'Bruce Wayne' ),
						array( 'superhero' => 'Aquaman', 'realname' => 'Arthur Curry' ),
					);
					
	$bigList = array();
	
	$cnt = 50;
	for( $i=0; $i < $cnt; $i++ )
	{
		foreach( $list as $row => $data )
		{
			array_push( $bigList, $data );
		}
	}
	
	$tmpl->addRows( 'list_entry', $bigList );
	
	$conditionList = array(
		array(
			'argh' => 'something',
		),
		array(
			'argh'	=>	'argh',
		),
	);
	
	$tmpl->addRows( 'with_conditions', $conditionList );
	
	$tmpl->dump();
?>
