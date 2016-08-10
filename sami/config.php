<?php

$src = __DIR__."/../src";
$out = __DIR__."/../docs";
$csh = __DIR__."/cache";

$options = [
		"build_dir" => $out,
		"cache_dir" => $csh,
];

return new Sami\Sami($src,$options);