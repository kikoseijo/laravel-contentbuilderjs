<?php

Route::post('/save-content-builder-page',['as'=>'template.save', 'uses' => 'TemplateController@saveTemplatePage']);	// Saves pages templates.
Route::get('/content-builder/edit/{page_id}?',['as'=>'template.edit', 'uses' => 'TemplateController@editTemplatePage']);	// Saves pages templates.
