<?php

require_once 'vendor/autoload.php';

$package = json_decode(file_get_contents('package.json'));
$kss = new \Kss\Parser($package->kss->source);
$kss->options = $package->kss->options;