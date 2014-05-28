<?php
/**
 * component.php
 * 
 * Display and handle component markup
 * 
 * @package     Joomla.Administrator
 * @subpackage  Templates.<%= _.slugify(name).toUpperCase() %>
 *
 * @copyright   Copyright (C) <%= currentDate %> <%= authorName %>. All rights reserved.
 * @license     <%= license %>
 */

defined("_JEXEC") or die;


$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$lang = JFactory::getLanguage();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Add JavaScript Frameworks
JHtml::_("bootstrap.framework");
<% if (includeModernizr) { %>$doc->addScriptVersion("templates/" . $this->template . "/bower_components/modernizr/modernizr.js");<% } %>
$doc->addScript("templates/" .$this->template. "/js/template.js");

// Add Stylesheets
$doc->addStyleSheet("templates/" .$this->template. "/styles/css/template.css");

// Load optional RTL Bootstrap CSS
JHtml::_("bootstrap.loadCss", false, $this->direction);

// Load specific language related CSS
$file = "language/" . $lang->getTag() . "/" . $lang->getTag() . ".css";
if (is_file($file)) :
	$doc->addStyleSheet($file);
endif;

?>
<!DOCTYPE html>
<html class="no-js" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1">
	<% if (!includeModernizr) { %><!--[if lt IE 9]>
	<script src = "../media/jui/js/html5.js"></script>
	<![endif]--><% } %>
</head>
<body class="contentpane component">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
