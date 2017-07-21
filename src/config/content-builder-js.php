<?php

return [
    'content_css' => Config('app.url').('/vendor/content-builder-js/assets/minimalist-basic/content.css'),
    'contentbuilder_css' => Config('app.url').('/vendor/content-builder-js/contentbuilder/contentbuilder.css'),

	'jquery' => Config('app.url').('/vendor/content-builder-js/contentbuilder/jquery.min.js'),
	'jquery-ui' => Config('app.url').('/vendor/content-builder-js/contentbuilder/jquery-ui.min.js'),
	'contentbuilderjs-src' => Config('app.url').('/vendor/content-builder-js/contentbuilder/contentbuilder.js'),
	'saveimages' => Config('app.url').('/vendor/content-builder-js/contentbuilder/saveimages.js'),

	'default' => [
		"snippetFile" => "/vendor/content-builder-js/assets/minimalist-basic/snippets.html",
		"snippetOpen" => true,
		"toolbar" => "right",
		"iconselect" => "/vendor/content-builder-js/assets/ionicons/selecticon.html",
	],

];
