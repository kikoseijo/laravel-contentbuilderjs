# Laravel Jquery Content Builder

[![StyleCI](https://styleci.io/repos/97931894/shield?branch=master)](https://styleci.io/repos/97931894)


This is a package made for laravel 5.4 and helps in the integration of a comercial product [innovastudio ContentBuilder](http://innovastudio.com/content-builder.aspx) (not included in this package) in a very clever way using couple of tables to store the data.
This plugins allows you, not only, to create and save templates in the database, but also allows you to create your own snippets that are organized by categories.

> This package does not comes with ContentBuilder.js source files. You have to purchase it and put all the files in the public folder.

### Docs

* [Demo](#demo)
* [Laravel compatibility](#laravel-compatibility)
* [Tutorials](#tutorials)
* [Installation](#installation-in-4-steps)
* [Configuration](#configuration)
* [Features list](#features-list)
* [FAQ / Support](#faq)

## Installation in 4 steps

### Step 1: Install package

Add the package in your composer.json by executing the command.

```bash
composer require ksoft/laravel-contentbuilderjs
```

Next, add the service provider to `app/config/app.php`

```
Ksoft\ContentBuilderJs\BuilderServiceProvider::class,
```

### Step 2: Migrations

This plugin uses couple of tables `cbldjs_templates` and `cbldjs_blocks`, run following command to migrate the tables:

```
php artisan migrate
```

### Step 3: Publish views, working folders and configuration

We must have a configuration file in order to run the plugin, this is done by running following command:

```
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=config
```

We also need a place to put all ContentBuilder.js files, you can find the folder where to put this files on running the following command:

```
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=public
```

If you need to customize the views you can do so by running the previous command with the `views` tag instead:

```
php artisan vendor:publish --provider="Ksoft\ContentBuilderJs\BuilderServiceProvider" --tag=views
```

### Step 4: Add couple of links to your backend to see it working

You now will be able to run the plugin but for convenience this are the main routes you need to call to have you running:

```html
<li><a href="{{route('cb_template.list')}}"><i class="fa fa-html5 fa-fw"></i> Template pages</a></li>
<li><a href="{{route('cb_block.list')}}"><i class="fa fa-code fa-fw"></i> Template Blocks</a></li>
```


make sure you have in layout header `@stack('stylesheets')``` also in footer ```@stack('scripts')```

@include('content-builder-js::tpl')

to be able to save images, need to add one line arround line 50

```
'<input id="_token" name="_token" type="hidden" value="'+ customval +'" />' +
```

You are done!
