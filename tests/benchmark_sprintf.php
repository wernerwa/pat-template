<?PHP
/**
 * simple benchmark to compare
 * concat (.) with sprintf.
 *
 * $Id: benchmark_sprintf.php 2 2004-02-25 16:40:02Z schst $
 *
 * @package		patTemplate
 * @subpackage	Tests
 * @author		Stephan Schmidt <schst@php-tools.net>
 */
 
 /**
  * uses PEAR's Benchmark_Timer class
  */
	require_once 'Benchmark/Timer.php';

	$start	=	'{';
	$stop	=	'}';

	$format	=	'{%s}';
	
	$name	=	'ANY_VARNAME';
	
	$timer	=	&new Benchmark_Timer();
	
	$timer->start();

	for( $i = 1; $i <= 5000; $i++ )
	{
		$foo	=	sprintf( $format, $name );
	}
	$timer->setMarker( 'sprintf' );


	for( $i = 1; $i <= 5000; $i++ )
	{
		$foo	=	$start.$name.$stop;
	}
	$timer->setMarker( 'concat' );

	$timer->stop();
	$timer->display();
?>