# generator-joomla-admin-template [![Build Status](https://secure.travis-ci.org/srsgores/generator-joomla-admin-template.png?branch=master)](https://travis-ci.org/srsgores/generator-joomla-admin-template)

> [Yeoman](http://yeoman.io) generator

*generator-joomla-admin-template* is a [yeoman](http://yeoman) generator, which allows you to automatically generate [joomla](https://github.com/joomla/joomla-cms) administrator templates for your back-end.

![joomla-admin-generation](https://cloud.githubusercontent.com/assets/1750837/3113939/afb2477a-e6e7-11e3-89ae-c8f5399d24fa.gif)

# Features

* **Accessified**.  I added WAI-ARIA roles to the markup
* **SASS-ready** (or LESS).  Choose what preprocessor you want to use
* PHPDoc comments.  Like this:

```
/**
 * index.php
 *
 * Entry point, layout view for owner template.
 *
 * @package     Joomla.Administrator
 * @subpackage  Templates.owner
 *
 * @copyright   Copyright (C) Wed May 28 2014 16:50:40 GMT-0600 (Mountain Daylight Time) Sean Goresht. All rights reserved.
 * @license     MIT
 * @since       3.0
 */
```

* **Based off the HTML5 boilerplate**.  You can actually expect root-level files like ``browserconfig.xml`` or ``apple-touch-icon-precomposed.png``
* Ready to go with my [sass boilerplate](https://github.com/srsgores/sass-boilerplate).
* **Bootstrap-free**!  But you can still use bootstrap if you really want to.

Generates:

* Internationalized language strings in the ``language`` folder (no more editing the ``language.ini`` files!)
* PHPDoc comments and header comments
* The entire ``templateDetails.xml`` file
* ``bower.json`` config file
* ``package.json`` config files for build processes
* Styles - SASS or LESS

## Quick Start

1. Install [nodejs](http://nodejs.org)
2. (Windows) Restart
3. Install [yeoman](http://yeoman.io):
```bash $ npm install -g yo```
4. Install *generator-joomla-admin-template* **globally** from npm:
```bash $ npm install -g generator-joomla-admin-template```
5. Run the generator: ```bash $ yo joomla-admin-template```

## FAQ

### So Bootstrap sucks.  What's a good alternative?

1. Use my [sass boilerplate](https://github.com/srsgores/sass-boilerplate) and customize it to your needs.  You will probably need to use bootstrap, though, as it's used throughout Joomla.  I suggest, however, fixing their mistakes and using proper selectors and variables.
2. Use [Zurb Foundation](http://foundation.zurb.com/)
3. Use anything else


### Are there plans for subgenerators for template fields?

Yes, I think this would be a good idea.  I would happily take any suggestions on implementing this.

### What dependencies are required for SASS?

I included the defaults for my [sass boilerplate](https://github.com/srsgores/sass-boilerplate) in the ``config.rb`` file, but you can change them.  In reality, there are actually **no gem dependencies**

### Wait, What is Yeoman?

Trick question. It's not a thing. It's this guy:

![](http://i.imgur.com/JHaAlBJ.png)

Basically, he wears a top hat, lives in your computer, and waits for you to tell him what kind of application you wish to create.

Not every new computer comes with a Yeoman pre-installed. He lives in the [npm](https://npmjs.org) package repository. You only have to ask for him once, then he packs up and moves into your hard drive. *Make sure you clean up, he likes new and shiny things.*

## Contributing
All contributions are welcome.  Please create an issue with the contents of your contribution.

## License

MIT
