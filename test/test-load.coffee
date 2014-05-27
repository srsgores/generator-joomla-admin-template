###
	generator-joomla-admin-template

	test-load.coffee

	@author Sean
	
	@note Created on 2014-05-27 by PhpStorm
	@note uses Codoc
	@see https://github.com/coffeedoc/codo
###

#global describe, beforeEach, it
"use strict"
assert = require("assert")
describe "joomla-admin-template generator", ->
	it "can be imported without blowing up", ->
		app = require("../app")
		assert app isnt `undefined`