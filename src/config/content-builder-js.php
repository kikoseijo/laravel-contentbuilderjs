<?php

return [
    'content_css'           => '/vendor/content-builder-js/assets/minimalist-basic/content-bootstrap.css',
    'contentbuilder_css'    => '/vendor/content-builder-js/contentbuilder/contentbuilder.css',
    'default_layout'        => 'content-builder-js::layout', // Layout main file ej.: layouts.default , default: content-builder-js::layout
    'route_prefix'          => 'content-builder-js',
    'middlewares'           => 'web,auth',
    'storage_path_blocks'   => 'public/block_thumbs/',  // folder in './storage' to save snippets images, default: public/block_thumbs/
    'storage_path_images'   => 'public/block_media/',   // floder in './storage' to upload template images, default: public/block_media/
    'storage_path_snippets' => 'public/block_snippets/',    // folder in './storage' to save snippets generated css and js, default: public/block_snippets/
    'load_bootstrap'        => true,
    'load_fontawesome'      => true,
    'load_jquery'           => true,    // Required, false if you are importing in your layout allready.
    'load_jquery_ui'        => true,    // Required, false if you are importing in your layout allready.
    'jquery'                => '/vendor/content-builder-js/contentbuilder/jquery.min.js',
    'jquery-ui'             => '/vendor/content-builder-js/contentbuilder/jquery-ui.min.js',
    'contentbuilderjs-src'  => '/vendor/content-builder-js/contentbuilder/contentbuilder.js',
    'saveimages'            => '/vendor/content-builder-js/contentbuilder/saveimages.js',
    'default'               => [  // nothing from here will run if custom_blocks_enabled are enabled.
        'snippetFile' => '/vendor/content-builder-js/assets/minimalist-basic/snippets-bootstrap.html',  // Adjust per your file storage settings.
        'snippetOpen' => true,
        'toolbar'     => 'left',
        'iconselect'  => '/vendor/content-builder-js/assets/ionicons/selecticon.html',
    ],
    'custom_blocks_enabled' => false,    // make it true after you created your first snippet.
    'custom'                => [  // will use this one if custom_blocks_enabled = true.
        'snippetFile' => '/storage/block_snippets/snippets.html',  // Adjust per your file storage settings.
        'snippetOpen' => true,
        'toolbar'     => 'left',
        'iconselect'  => '/vendor/content-builder-js/assets/ionicons/selecticon.html',
    ],
    'snippetJs'     => '/storage/block_snippets/js.js', // Adjusting this are not an option righ now.
    'snippetCss'    => '/storage/block_snippets/content.css', // Adjusting this are not an option righ now.
    'extraJsLibs'   => [ // add here extra libs you need to load in your scripts stack.
        //'https://unpkg.com/vue'
    ],
    'extraCssLibs'  => [ // add here extra css files you need to load in your header.
        //'https://cdnjs.com/libraries/bulma'
    ],
    'categories'    => [       // changes here are not reflecting when creating new templates, only when editing snippets.
        '0'  => 'Default',
        '-1' => 'All',
        '1'  => 'Title',
        '2'  => 'Title, Subtitle',
        '3'  => 'Info, Title',
        '4'  => 'Info, Title, Subtitle',
        '5'  => 'Heading, Paragraph',
        '6'  => 'Paragraph',
        '7'  => 'Paragraph, Images + Caption',
        '8'  => 'Heading, Paragraph, Images + Caption',
        '33' => 'Buttons',
        '34' => 'Cards',
        '9'  => 'Images + Caption',
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
        '19' => 'Separator',
    ],

];
