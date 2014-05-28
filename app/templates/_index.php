<?php
/**
 * index.php
 *
 * Entry point, layout view for <%= name %> template.
 *
 * @package     Joomla.Administrator
 * @subpackage  Templates.<%= _.slugify(name) %>
 *
 * @copyright   Copyright (C) <%= currentDate %> <%= authorName %>. All rights reserved.
 * @license     <%= license %>
 * @since       3.0
 */

defined("_JEXEC") or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$lang = JFactory::getLanguage();
$this->language = $doc->language;
$this->direction = $doc->direction;
$input = $app->input;
$user = JFactory::getUser();

// Add JavaScript Frameworks
JHtml::_("bootstrap.framework");
$doc->addScriptVersion("templates/" . $this->template . "/js/template.js");

// Add Stylesheets
$doc->addStyleSheetVersion("templates/" . $this->template . "/css/template" . ($this->direction == "rtl" ? "-rtl" : "") . ".css");

// Load specific language related CSS
$file = "language/" . $lang->getTag() . "/" . $lang->getTag() . ".css";

if (is_file($file)) {
	$doc->addStyleSheetVersion($file);
}

// Detecting Active Variables
$option = $input->get("option", "");
$view = $input->get("view", "");
$layout = $input->get("layout", "");
$task = $input->get("task", "");
$itemid = $input->get("Itemid", "");
$sitename = $app->getCfg("sitename");

$cpanel = ($option === "com_cpanel");

$showSubmenu = false;
$this->submenumodules = JModuleHelper::getModules("submenu");
foreach ($this->submenumodules as $submenumodule) {
	$output = JModuleHelper::renderModule($submenumodule);
	if (strlen($output)) {
		$showSubmenu = true;
		break;
	}
}

// Logo file
if ($this->params->get("logoFile")) {
	$logo = JUri::root() . $this->params->get("logoFile");
}
else {
	$logo = $this->baseurl . "/templates/" . $this->template . "/images/logo.png";
}

// Template Parameters
$displayHeader = $this->params->get("displayHeader", "1");
$statusFixed = $this->params->get("statusFixed", "1");
$stickyToolbar = $this->params->get("stickyToolbar", "1");
?>
<!DOCTYPE html>
<html class="no-js" xml:lang = "<?php echo $this->language; ?>" lang = "<?php echo $this->language; ?>" dir = "<?php echo $this->direction; ?>">
<head>
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1">
	<jdoc:include type="head"/>

	<!--[if lt IE 9]>
	<script src = "../media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class = "admin <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid; ?>" <?php if ($stickyToolbar) : ?>data-spy = "scroll" data-target = ".subhead" data-offset = "87"<?php endif; ?> role="application">
	<div class="container">
		<!-- Top Navigation -->
		<header role="banner">
			<nav class = "navbar navbar-inverse navbar-fixed-top" role="navigation">
				<?php if ($this->params->get("admin_menus") != "0") : ?>
					<a class = "btn btn-navbar" data-toggle = "collapse" data-target = ".nav-collapse">
						<i class="icon-menu"></i>
					</a>
				<?php endif; ?>
				<a class = "admin-logo" href = "<?php echo $this->baseurl; ?>"><i class = "icon-joomla"></i></a>
				<a class = "brand" href = "<?php echo JUri::root(); ?>" title = "<?php echo JText::sprintf("TPL_ISIS_PREVIEW", $sitename); ?>" target = "_blank"><?php echo JHtml::_("string.truncate", $sitename, 14, false, false); ?>
					<i class = "icon-out-2"></i></a>
				<div <?php echo ($this->params->get("admin_menus") != "0") ? " class='nav-collapse'" : ""; ?>>
					<jdoc:include type="modules" name="menu" style="none"/>
					<ul class = "nav nav-user<?php echo ($this->direction == "rtl") ? " pull-left" : " pull-right"; ?>">
						<li class = "dropdown">
							<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#">
								<i class = "icon-cog"></i>
								<i class="icon-caret-down"></i>
							</a>
							<ul class = "dropdown-menu">
								<li>
									<i class = "icon-user"></i>
									<strong><?php echo $user->name; ?></strong>
								</li>
								<li class = "divider"></li>
								<li class = "">
									<a href = "index.php?option=com_admin&task=profile.edit&id=<?php echo $user->id; ?>"><?php echo JText::_("TPL_ISIS_EDIT_ACCOUNT"); ?></a>
								</li>
								<li class = "divider"></li>
								<li>
									<a href = "<?php echo JRoute::_("index.php?option=com_login&task=logout&" . JSession::getFormToken() . "=1"); ?>"><?php echo JText::_("TPL_ISIS_LOGOUT"); ?></a>
								</li>
							</ul>
						</li>
					</ul>
					<a class = "brand" href = "<?php echo JUri::root(); ?>" title = "<?php echo JText::sprintf("TPL_ISIS_PREVIEW", $sitename); ?>" target = "_blank"><?php echo JHtml::_("string.truncate", $sitename, 14, false, false); ?>
						<i class = "icon-out-2"></i></a>
				</div>
			</nav>
		</header>

		<!-- Header -->
		<?php if ($displayHeader) : ?>
			<header class = "header" role="banner">
				<div class = "container-logo">
					<img src = "<?php echo $logo; ?>" class = "logo"/>
				</div>
				<aside class = "container-title" role="complementary">
					<jdoc:include type="modules" name="title"/>
				</aside>
			</header>
		<?php endif; ?>
		<?php if ((!$statusFixed) && ($this->countModules("status"))) : ?>
			<!-- Begin Status Module -->
			<aside id = "status" class = "status" role="complementary">
				<div class = "btn-toolbar">
					<jdoc:include type="modules" name="status" style="no"/>
				</div>
			</aside>
			<!-- End Status Module -->
		<?php endif; ?>
		<?php if (!$cpanel) : ?>
			<!-- Subheader (expandable) -->
			<a class = "btn btn-subhead" data-toggle = ".subhead"><?php echo JText::_("TPL_ISIS_TOOLBAR"); ?> <i class = "icon-wrench"></i></a>
			<aside class = "subhead" role="complementary">
				<jdoc:include type="modules" name="toolbar" style="no"/>
			</aside>
		<?php endif; ?>
		<div class = "container-main">
			<article id = "content" role="main">
				<!-- Begin Content -->
				<jdoc:include type="modules" name="top" style="xhtml"/>
				<div class = "content-container">
					<?php if ($showSubmenu) : ?>
					<div class = "span2 submenu">
						<jdoc:include type="modules" name="submenu" style="none"/>
					</div>
					<div class = "span10">
						<?php else : ?>
						<div class = "span12">
							<?php endif; ?>
							<jdoc:include type="message"/>
							<?php
							// Show the page title here if the header is hidden
							if (!$displayHeader) : ?>
								<h1 class = "content-title"><?php echo JHtml::_("string.truncate", $app->JComponentTitle, 0, false, false); ?></h1>
							<?php endif; ?>
							<jdoc:include type="component"/>
						</div>
					</div>
					<?php if ($this->countModules("bottom")) : ?>
						<jdoc:include type="modules" name="bottom" style="xhtml"/>
					<?php endif; ?>
					</div>
					<!-- End Content -->
			</article>
			</div>
			<footer class = "footer" role="contentinfo">
				<?php if (!$this->countModules("status") || (!$statusFixed && $this->countModules("status"))) : ?>
					<small>
						<jdoc:include type="modules" name="footer" style="no"/>
						&copy; <?php echo $sitename; ?> <?php echo date("Y"); ?></small>
				<?php endif; ?>
		<?php if (($statusFixed) && ($this->countModules("status"))) : ?>
			<!-- Begin Status Module -->
			<aside id = "status" class = "status-summary">
				<div class = "btn-toolbar" role="status">
					<div class = "joomla-version-info">
						<small>
							<jdoc:include type="modules" name="footer" style="no"/>
							&copy; <?php echo date("Y"); ?> <?php echo $sitename; ?>
						</small>
					</div>
					<jdoc:include type="modules" name="status" style="no"/>
				</div>
			</aside>
			<!-- End Status Module -->
		<?php endif; ?>
		</footer>
		<jdoc:include type="modules" name="debug" style="none"/>
		<?php if ($stickyToolbar) : ?>
			<script>
				(function ($) {
					// fix sub nav on scroll
					var $win = $(window)
						, $nav = $(".subhead")
						, navTop = $(".subhead").length && $(".subhead").offset().top - <?php if ($displayHeader || !$statusFixed) : ?>40<?php else:?>20<?php endif;?>
						, isFixed = 0

					processScroll();

					// hack sad times - holdover until rewrite for 2.1
					$nav.on("click", function () {
						if (!isFixed) {
							setTimeout(function () {
								$win.scrollTop($win.scrollTop() - 47)
							}, 10)
						}
					});

					$win.on("scroll", processScroll)

					function processScroll() {
						var i, scrollTop = $win.scrollTop()
						if (scrollTop >= navTop && !isFixed) {
							isFixed = 1;
							$nav.addClass("subhead-fixed")
						}
						else if (scrollTop <= navTop && isFixed) {
							isFixed = 0;
							$nav.removeClass("subhead-fixed")
						}
					}
				})(jQuery);
			</script>
		<?php endif; ?>
	</div>
</body>
</html>