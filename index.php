<?php

// TOPIC: basic
// composer init
// command: composer require phpmailer/phpmailer
// add at composer.json: "league/color-extractor": "0.3.*"

// TOPIC:
// composer install: install composer.json, if there's a lock install the exact versions from there
// --no-dev to skill install from require-dev (the default is --dev)
// composer update: update dependencies as defined by composer.json, regenerate lock

// TOPIC: delete package
// to remove, delete line in composer.json and composer update
// or composer remove vendor/package

// TOPIC: help
// to get a info about a command, for example the command install:
// composer help install

// TOPIC:
// to require a php version, put inside require:
// "php": "7.1.0"

// TOPIC: semantic versioning
// https://semver.mwl.be/
// "vendor/package": "1.3" - exact version
// "vendor/package": "1.3 - 1.4" - range
// "vendor/package": "1.3.*" - wildcard
// "vendor/package": "^1.3" - caret, major (>1.3 - <2)
// tilde is like a * in the last number
// "vendor/package": "~1.3" - tilde (>1.3 - <2)
// "vendor/package": "~1.3.0" - tilde (>1.3 - <1.4)
// "vendor/package": ">=1.3"

// TOPIC: show all installed dependencies
// command: composer show -t

// TOPIC: scripts
// two types: (predefined) event or custom
// can either be a PHP callback (defined as a static method) or command-line executable command

// NOTE: event names
// e.g., pre-install-cmd, post-update-cmd, pre-package-uninstall, init
// NOTE: custom
// naming a script anything thing else besides the defined events, make it a custom script

// NOTE: run manually
// composer run-script [--dev] [--no-dev] scriptname

// NOTE: entire files, other scripts and composer commands
// to run entire files use "@php"
// to referencing others scripts prefix it with "@"
// to call composer commands use @composer

// NOTE: defining scripts
  // "scripts": {
  //   "pre-install-cmd": "Scripts::begin()",
  //   "post-install-cmd": "Scripts::end()",
  //   "myphp": "@php script.php",
  //   "tree": "@composer show -t",
  //   "myinfo": [
  //     "echo \"myinfo began\"",
  //     "@tree",
  //     "echo \"myinfo finished\""
  //   ]
  // }


// TOPIC: autoloader
require "vendor/autoload.php";

// NOTE: after edit the autoload at composer.json:
// command (generate new autoload without install or update):
// composer dump-autoload

// NOTE: simplest way is to autoload each class separately
// add to composer.json:
  // "autoload": {
  //   "classmap": [
  //     "vendor/galbuquerque/Utils.php"
  //   ]
  // }

// NOTE: PSR-4 way
// {
//   "autoload": {
//     "psr-4": {
//       "galbuquerque\\":"src/"
//     }
//   }
// }
// the files at "src/" must have namespace set to "galbuquerque"
// to use the class: "use galbuquerque\Class.php";
// NOTE: if the structure is complex (subfolder):
  // change namespace to "namespace/subfolder";
  // use with: "use namespace/subfolder/class";

  // NOTE:
  // to require certain files in every request use the "file" array
  // "autoload": {
  //   "psr-4": {
  //     "galbuquerque\\": "src/"
  //   },
  //   "files": [
  //     "test.php"
  //   ]
  // }

// command: composer require joshtronic/php-loremipsum
use joshtronic\LoremIpsum;
use galbuquerque\Utils;

$lorem = new LoremIpsum();

$text = $lorem->words(5);

echo Utils::my_pad($text);

fromFiles();

// TOPIC: publish a package
// to public a package commit to github
// submit to packagist
// to make the package accessible out of "minimum-stability": "dev"; go to github and release a version
// to make a commit update automatically a package, set a packagist webhook at github settings
