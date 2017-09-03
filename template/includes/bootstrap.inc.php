<?php

require_once 'vendor/autoload.php';

$config = json_decode(file_get_contents('config.json'));
$kss = new \Kss\Parser($config->kss->source);
$kss->options = $config->kss->options;