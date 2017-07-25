<?php

return [
    'content_css' => '/vendor/content-builder-js/assets/minimalist-basic/content-bootstrap.css',
    'contentbuilder_css' => '/vendor/content-builder-js/contentbuilder/contentbuilder.css',
    'default_layout' => 'content-builder-js::layout', // Common files  layouts.default
    'route_prefix' => 'content-builder-js',
    'middlewares' => 'web,auth',
    'storage_path_blocks' => 'upload/block_items/',
    'storage_path_images' => 'upload/block_media/',
    'load_bootstrap' => true,
    'load_jquery' => true,
    'load_jquery_ui' => true,
    'jquery' => '/vendor/content-builder-js/contentbuilder/jquery.min.js',
    'jquery-ui' => '/vendor/content-builder-js/contentbuilder/jquery-ui.min.js',
    'contentbuilderjs-src' => '/vendor/content-builder-js/contentbuilder/contentbuilder.js',
    'saveimages' => '/vendor/content-builder-js/contentbuilder/saveimages.js',

	'default' => [
		"snippetFile" => "/vendor/content-builder-js/assets/minimalist-basic/snippets-bootstrap.html",
		"snippetOpen" => true,
		"toolbar" => "left",
		"iconselect" => "/vendor/content-builder-js/assets/ionicons/selecticon.html",
	],

];
