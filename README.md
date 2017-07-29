# Laravel ContentBuilderJs

[![TravisCI](https://travis-ci.org/kikoseijo/laravel-contentbuilderjs.svg?branch=master)](https://travis-ci.org/kikoseijo/laravel-contentbuilderjs.svg?branch=master)
[![StyleCI](https://styleci.io/repos/97931894/shield?branch=master)](https://styleci.io/repos/97931894)


This is a package made for laravel 5.4 and helps in the integration of a comercial product [Innovastudio ContentBuilder.js](http://innovastudio.com/content-builder.aspx) in a way that its using a couple of tables to store the data.
This plugins allows you, not only, to create and save templates in the database, but also allows you to create your own snippets that are organized by categories.

> This package does not comes with ContentBuilder.js source files. You have to purchase it and put all the files in the public folder.

### Docs

* [Installation](#installation-in-4-steps)
* [FAQ / Support](#troubleshooting-and-configuration-tips)
* [License](#license)
* [Links](#links)

## Installation in 4 steps

### Step 1: Install package

Add the package in your `composer.json` by executing the command.

```bash
composer require ksoft/laravel-contentbuilderjs
```

Next, add the service provider to `config/app.php`

```
Ksoft\ContentBuilderJs\BuilderServiceProvider::class,
```

### Step 2: Migrations

This plugin uses couple of tables `cbldjs_templates` and `cbldjs_blocks`, run following command to migrate the tables:

```
php artisan migrate
```

### Step 3: Publish vendors

You can install all the following by running a single command:

```
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider"
```

Or you can do each one individualy using the --tag

```
// Configuration file config/content-builder-js.php
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=config
// ContentBuilder.js files must be put in public/vendors/content-builder-js
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=public
// Views
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=views
```

### Step 4: Routes and backend menu links

We need to add the rotues to `routes/web.php`

```
\Ksoft\ContentBuilderJs\BuilderServiceProvider::routes();
```
>middlewares can be configured trough the `config('content-builder-js.middlewares')` by default them protected with `web,auth`

You now will be able to run the plugin but for convenience this are the main routes you need to call to have you running:

```html
<li><a href="{{route('cb_template.list')}}"><i class="fa fa-html5 fa-fw"></i> Template pages</a></li>
<li><a href="{{route('cb_block.list')}}"><i class="fa fa-code fa-fw"></i> Template Blocks</a></li>
```

## Troubleshooting and Configuration tips

### Layouts

To fully integrate with your custom layouts define the name of the layout using the `config('content-builder-js.middlewares')` parameter and add couple of stack to inject the CSS  `@stack('stylesheets')` and for javascripts `@stack('scripts')`

### CSRF Token

By default, the saveimage.js script that comes with Contentbuilder.js does not include the laravel token, to fix this we  need to add a token field to this file arround line 50

```javascript
'<input id="_token" name="_token" type="hidden" value="'+ customval +'" />' +
```

## License

The Laravel ContentBuilderJs package is licensed under the terms of the MIT license and
is available for free.

## Links

* [Credits](https://sunnyface.com?ref=github_laravel_contentbuilder)
* [Developper](https://kikoseijo.com?ref=github_laravel_contentbuilder)
