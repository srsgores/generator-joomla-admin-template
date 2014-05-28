<?php
/**
 * login.php
 * 
 * Display login form for joomla back-end users
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

// Add JavaScript Frameworks
JHtml::_("bootstrap.framework");
JHtml::_("bootstrap.tooltip");

// Add Stylesheets
$doc->addStyleSheet("templates/" .$this->template. "/css/template.css");

// Load optional RTL Bootstrap CSS
JHtml::_("bootstrap.loadCss", false, $this->direction);

// Load specific language related CSS
$file = "language/" . $lang->getTag() . "/" . $lang->getTag() . ".css";
if (is_file($file))
{
	$doc->addStyleSheet($file);
}

// Detecting Active Variables
$option   = $app->input->getCmd("option", "");
$view     = $app->input->getCmd("view", "");
$layout   = $app->input->getCmd("layout", "");
$task     = $app->input->getCmd("task", "");
$itemid   = $app->input->getCmd("Itemid", "");
$sitename = $app->get("sitename");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<jdoc:include type="head" />
	<!--[if lt IE 9]>
		<script src="../media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid . " ";?>" role="application">
	<!-- Container -->
	<div class="container">
		<article id="content" role="main">
			<!-- Begin Content -->
			<div id="element-box" class="login">
				<header>
					<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/images/joomla.png" alt="Joomla!" />
				</header>
				<jdoc:include type="message" />
				<jdoc:include type="component" />
			</div>
			<noscript>
				<?php echo JText::_("JGLOBAL_WARNJAVASCRIPT") ?>
			</noscript>
			<!-- End Content -->
		</article>
		<footer class="navbar navbar-fixed-bottom hidden-phone">
			<small>
				&copy; <?php echo date("Y"); ?> <?php echo $sitename; ?>
			</small>
			<a class="login-joomla" href="http://www.joomla.org" target="_blank" class="hasTooltip" title="<?php echo JHtml::tooltipText("TPL_<%= _.slugify(name).toUpperCase() %>_ISFREESOFTWARE");?>">Joomla!&#174;</a>
			<a href="<?php echo JUri::root(); ?>" target="_blank" class="pull-left"><i class="icon-share icon-white"></i> <?php echo JText::_("COM_LOGIN_RETURN_TO_SITE_HOME_PAGE") ?></a>
		</footer>
		<jdoc:include type="modules" name="debug" style="none" />
	</div>
</body>
</html>
