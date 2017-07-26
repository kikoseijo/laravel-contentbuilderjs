<?php

return [
    'content_css' => '/vendor/content-builder-js/assets/minimalist-basic/content-bootstrap.css',
    'custom_css' => '/storage/block_snippets/content.css',
    'contentbuilder_css' => '/vendor/content-builder-js/contentbuilder/contentbuilder.css',
    'default_layout' => 'content-builder-js::layout', // Common files  layouts.default
    'route_prefix' => 'content-builder-js',
    'middlewares' => 'web,auth',
    'storage_path_blocks' => 'public/block_thumbs/',
    'storage_path_images' => 'public/block_media/',
    'storage_path_snippets' => 'public/block_snippets/',
    'load_bootstrap' => true,
    'load_jquery' => true,
    'load_jquery_ui' => true,
    'jquery' => '/vendor/content-builder-js/contentbuilder/jquery.min.js',
    'jquery-ui' => '/vendor/content-builder-js/contentbuilder/jquery-ui.min.js',
    'contentbuilderjs-src' => '/vendor/content-builder-js/contentbuilder/contentbuilder.js',
    'saveimages' => '/vendor/content-builder-js/contentbuilder/saveimages.js',

	'default' => [
		'snippetFile' => '/vendor/content-builder-js/assets/minimalist-basic/snippets-bootstrap.html',
		'snippetOpen' => true,
		'toolbar' => 'left',
		'iconselect' => '/vendor/content-builder-js/assets/ionicons/selecticon.html',
	],
    'use_custom_snippets' => false,
	'custom' => [
		'snippetFile' => '/storage/block_snippets/snippets.html',
		'snippetOpen' => true,
		'toolbar' => 'left',
		'iconselect' => '/vendor/content-builder-js/assets/ionicons/selecticon.html',
	],



    'categories' => [
        '0' =>'Default',
        '-1' => 'All',
        '1' => 'Title',
        '2' => 'Title, Subtitle',
        '3' => 'Info, Title',
        '4' => 'Info, Title, Subtitle',
        '5' => 'Heading, Paragraph',
        '6' => 'Paragraph',
        '7' => 'Paragraph, Images + Caption',
        '8' => 'Heading, Paragraph, Images + Caption',
        '33' => 'Buttons',
        '34' => 'Cards',
        '9' => 'Images + Caption',
        '10' => 'Images + Long Caption',
        '11' => 'Images',
        '12' => 'Single Image',
        '13' => 'Call to Action',
        '14' => 'List',
        '15' => 'Quotes',
        '16' => 'Profile',
        '17' => 'Map',
        '20' => 'Video',
        '18' => 'Social',
        '21' => 'Services',
        '22' => 'Contact Info',
        '23' => 'Pricing',
        '24' => 'Team Profile',
        '25' => 'Products/Portfolio',
        '26' => 'How It Works',
        '27' => 'Partners/Clients',
        '28' => 'As Featured On',
        '29' => 'Achievements',
        '32' => 'Skills',
        '30' => 'Coming Soon',
        '31' => 'Page Not Found',
        '19' => 'Separator'
    ]

];
