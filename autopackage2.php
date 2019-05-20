<?php
/**
 * package.xml generation file for patTemplate
 *
 * This file is executed by createSnaps.php to
 * automatically create a package that can be
 * installed via the PEAR installer.
 *
 * $Id: autopackage2.php 462 2007-06-12 21:15:34Z gerd $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 * @package		patTemplate
 * @subpackage	Tools
 */

/**
 * uses PackageFileManager
 */
require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR/PackageFileManager/Svn.php';

include dirname( __FILE__ ) . '/package-config.php';

$package = new PEAR_PackageFileManager2();

$result = $package->setOptions( $options );
if( PEAR::isError( $result ) ) {
    echo $result->getMessage();
    die( __LINE__ . "\n" );
}

$package->setPackage($name);
$package->setSummary($summary);
$package->setDescription($description);

$package->setChannel($channel);
$package->setAPIVersion($apiVersion);
$package->setReleaseVersion($version . 'dev' . $argv[1]);
$package->setReleaseStability('devel');
$package->setAPIStability($apiStability);
$package->setNotes($notes);
$package->setPackageType('php'); // this is a PEAR-style php script package
$package->setLicense('LGPL', 'http://www.gnu.org/copyleft/lesser.txt');

foreach($maintainer as $m) {
    $package->addMaintainer($m['role'], $m['handle'], $m['name'], $m['email'], $m['active']);
}

foreach($dependency as $d) {
    $package->addPackageDepWithChannel($d['type'], $d['package'], $d['channel'], $d['version']);
}
$package->setPhpDep( $require['php'] );
$package->setPearinstallerDep($require['pear_installer']);

$package->generateContents();

$result = $package->writePackageFile();
if (PEAR::isError($result)) {
    echo $result->getMessage();
    die();
}
exit( 0 );
?>
