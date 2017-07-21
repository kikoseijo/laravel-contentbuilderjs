<?php

return [
    'style_css' => Config('app.url').('/vendor/content-builder/css/style.css'),
    'content_css' => Config('app.url').('/vendor/content-builder/assets/minimalist-basic/content.css'),
    'contentbuilder_css' => Config('app.url').('/vendor/content-builder/contentbuilder/contentbuilder.css'),
    'font_css' => Config('app.url').('/vendor/content-builder/css/fonts.css'),
    'bootstrapcdn_css' => ('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'),
    'googlefont_css' => ('https://fonts.googleapis.com/css?family=Lato'),

	'jquery' => Config('app.url').('/vendor/content-builder/contentbuilder/jquery.min.js'),
	'jquery-ui' => Config('app.url').('/vendor/content-builder/contentbuilder/jquery-ui.min.js'),
	'contentbuilder-src' => Config('app.url').('/vendor/content-builder/contentbuilder/contentbuilder-src.js'),
	'saveimages' => Config('app.url').('/vendor/content-builder/contentbuilder/saveimages.js'),
	
	'default' => [
		"snippetFile" => "/vendor/content-builder/assets/minimalist-basic/snippets.html",
		"snippetOpen" => true,
		"toolbar" => "left",
		"iconselect" => "/vendor/content-builder/assets/ionicons/selecticon.html",
	],

	// Custom

];
