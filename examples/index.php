<?php
/**
 * Frameset for the examples
 *
 * @package     patTemplate
 * @subpackage  Examples
 * @author      Sebastian Mordziol <argh@php-tools.net>
 */

/**
 * require section config
 */
    require_once 'index_sections.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title><?php echo $appName; ?>: examples</title>
</head>

<frameset cols="300,*" border="1" frameborder="1" framespacing="0">
    <frame name="nav" src="index_nav.php" scrolling="yes" marginwidth="0" marginheight="0" frameborder="1">
    <frame name="display" src="index_main.php" scrolling="yes" marginwidth="0" marginheight="0" frameborder="1">
</frameset>

</body>
</html>
