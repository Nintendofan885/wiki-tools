# Hay's wiki tools
Source code for all of my [wiki tools](https://hay.toolforge.org/)

## Running it
* Create a `config.php` file (use `config-sample.php` as an example) in the `lib` directory.
* Do a `composer install` in the lib/ directory. For this you need [Composer](https://getcomposer.org).
* Do a `bower init` in the root directory
* Some tools (like VizQuery) need a `npm install` in their root as well. VizQuery also needs a 'npm run build' to build the bundle.

## Remarks
* To generate the `props.html` file that is used in the Wikidata Property browser, either:
    * Run the `get-wikidata-props.py` script located in `etc/wikidata-props`
    * Or if you're lazy simply download it from the live site: https://hay.toolforge.org/propbrowse/props.html

## License
All code is licensed under the terms of the [MIT / X11](https://opensource.org/licenses/MIT) license.

## Credits
Some of this stuff was written for my work as [Wikipedian in Residence](https://nl.wikipedia.org/wiki/Wikipedia:GLAM/KBNA) at the Dutch [National Library](https://www.kb.nl) and [National Archive](https://www.gahetna.nl).
