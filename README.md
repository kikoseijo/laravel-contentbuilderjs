# laravel-contentbuilderjs
Laravel package for ContentBuilderjs
Based on an outdated plugin https://github.com/sahbaj/laravel-content-builder-js


This package is not with ContentBuilder.js source files. You have to purchase it and put all the files in assests folder.

USAGE

For Laravel 5.2+

composer require ksoft/laravel-contentbuilderjs

add the following line in config/app.php
```
Ksoft\ContentBuilderJs\ContentBuilderJsServiceProvider::class,
```

Publish config and vendors

```
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=config --force && php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=public --force
```

@include('content-builder-js::tpl')

You are done!
