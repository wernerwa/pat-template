<?PHP
/**
 * patTemplate example that show how
 * to display debug information about
 * the loaded templates and their variables
 *
 * $Id: example_dump_dhtml.php 188 2004-04-27 21:01:17Z argh $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.de
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