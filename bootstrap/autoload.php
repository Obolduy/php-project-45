<?php

$autoloadPathComposerGlobal = __DIR__ . '/../../../autoload.php';
$autoloadPathLocal = __DIR__ . '/../vendor/autoload.php';

require_once file_exists($autoloadPathComposerGlobal) ? $autoloadPathComposerGlobal : $autoloadPathLocal;
