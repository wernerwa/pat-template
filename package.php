<?php
/**
 * script to automate the generation of the
 * package.xml file.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 * @package     patTemplate
 * @subpackage  Tools
 */

/**
 * uses PackageFileManager Version 2
 */
require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR/PackageFileManager/Svn.php';

include dirname(__FILE__) . '/package-config.php';

$package = new PEAR_PackageFileManager2();

$result = $package->setOptions($options);
if (PEAR::isError($result)) {
    echo $result->getMessage();
    die(__LINE__ . "\n");
}

$package->setPackage($name);
$package->setSummary($summary);
$package->setDescription($description);

$package->setChannel($channel);
$package->setAPIVersion($apiVersion);
$package->setReleaseVersion($version . $versionBuild);
$package->setReleaseStability($state);
$package->setAPIStability($apiStability);
$package->setNotes($notes);
$package->setPackageType('php'); // this is a PEAR-style php script package
$package->setLicense($license['name'], $license['url']);

foreach ($maintainer as $m) {
    $package->addMaintainer($m['role'], $m['handle'], $m['name'], $m['email'], $m['active']);
}

foreach ($dependency as $d) {
    $package->addPackageDepWithChannel($d['type'], $d['package'], $d['channel'], $d['version']);
}
$package->setPhpDep($require['php']);
$package->setPearinstallerDep($require['pear_installer']);

$package->generateContents();

if (isset($_GET['make']) || isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'make') {
    $package->writePackageFile();
} else {
    $package->debugPackageFile();
}
exit(0);
