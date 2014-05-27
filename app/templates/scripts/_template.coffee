###
	<%= name %>

	_template.coffee

	@package     Joomla.Administrator
	@subpackage  Templates.<%= _.slugify(name) %>
	@copyright   Copyright (C) 2005 - 2014 <%= license %>
	@license     <%= license %>
	@since       3.0
###

initBootstrap = ->
	$dropdowns = $(".dropdown-toggle").dropdown()
	$accordions = $(".collapse").collapse("show")
	$modals = $("#myModal").modal("hide")
	$typeaheads = $(".typeahead").typeahead()
	$tabs = $(".tabs").button()
	$tooltips = $(".tip").tooltip()
	$alerts = $(".alert-message").alert()

jQuery(document).ready ->
	# initBootstrap()