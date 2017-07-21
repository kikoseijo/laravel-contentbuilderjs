# laravel-contentbuilderjs
Laravel package for ContentBuilderjs
Based on an outdated plugin https://github.com/sahbaj/laravel-content-builder-js


This package is not with ContentBuilder.js source files. You have to purchase it and put all the files in assests folder.

USAGE

For Laravel 5.2 & 5.3

composer require ksoft/content-builder-js

add the following line in config/app.php
Ksoft\ContentBuilderJs\ContentBuilderJsServiceProvider::class,

Publishing config tag vendor
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\ContentBuilderJsServiceProvider" --tag=config --force

It will publishh all config file to laravel config folder


Publishing public tag vendor
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\ContentBuilderJsServiceProvider" --tag=public --force

It will publish all public content to laravel public folder

Add this line in any of your view file and see the magic
@include('content-builder-js::tpl')

For more help visit http://innovastudio.com/content-builder.aspx
