###
	generator-joomla-admin-template

	test-creation.coffee

	@author Sean
	
	@note Created on 2014-05-27 by PhpStorm
	@note uses Codoc
	@see https://github.com/coffeedoc/codo
###

#global describe, beforeEach, it
"use strict"
path = require("path")
helpers = require("yeoman-generator").test
describe "joomla-admin-template generator", ->
	beforeEach (done) ->
		helpers.testDirectory path.join(__dirname, "temp"), ((err) ->
			return done(err) if err
			@app = helpers.createGenerator("joomla-admin-template:app", ["../../app"])
			done()
		).bind(this)

	it "creates expected files", (done) ->
		expected = [

			# add files you expect to exist here.
			".jshintrc"
			".editorconfig"
		]
		helpers.mockPrompt @app,
			someOption: true

		@app.options["skip-install"] = true
		@app.run {}, ->
			helpers.assertFile expected
			done()