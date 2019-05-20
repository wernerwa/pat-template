-- phpMyAdmin SQL Dump
-- version 2.6.0-rc3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2005 at 11:54 AM
-- Server version: 4.0.21
-- PHP Version: 5.0.2
--
-- Database: `test`
--
-- Use this dump when testing the DB reader for patTemplate
--

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` varchar(20) NOT NULL default '',
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` VALUES ('table', '<patTemplate:tmpl name="table">\r\n\r\n<patTemplate:tmpl name="header" src="templates[@id=header]/@content"/>\r\n\r\n<table border="1" cellpadding="5" cellspacing="0">\r\n<patTemplate:tmpl name="row" type="condition" conditionvar="doesnotmatter">\r\n\r\n	<patTemplate:sub condition="__first">\r\n	<!-- This is the template for the first row -->\r\n	<tr>\r\n	<patTemplate:tmpl name="cellhead">\r\n		<th><patTemplate:var name="value" modifier="htmlentities"/></th>\r\n	</patTemplate:tmpl>\r\n	</tr>\r\n	</patTemplate:sub>\r\n\r\n	<patTemplate:sub condition="__default">\r\n	<!-- This is the template for all other rows -->\r\n	<tr>\r\n	<patTemplate:tmpl name="cell">\r\n		<td><patTemplate:var name="value" modifier="htmlentities"/></td>\r\n	</patTemplate:tmpl>\r\n	</tr>\r\n	</patTemplate:sub>\r\n</patTemplate:tmpl>\r\n</table>\r\n<br />\r\n<strong>How the example works:</strong><br />\r\n<p>\r\n	If you pass a multi-dimensional variable to\r\n	a template that has one child element, patTemplate\r\n	will automatically start repeating this template\r\n	and add the values to its child on each interation.\r\n</p>\r\n<p>\r\n	If a template has more than one child, you may\r\n	use the <strong>child</strong> attribute of the\r\n	<strong>tmpl</strong> tag to define to which template\r\n	should be repeated.\r\n</p>\r\n<p>\r\n	To replace &lt;, &gt; and other HTML special chars,\r\n	a modifier is applied to the variable.\r\n</p>\r\n</patTemplate:tmpl>');
INSERT INTO `templates` VALUES ('header', 'This is an external template...<br/>\r\n<patTemplate:tmpl name="foo">\r\n<p>Please hide me!</p>\r\n</patTemplate:tmpl>');
