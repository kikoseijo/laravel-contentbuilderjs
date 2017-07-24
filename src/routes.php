<?php
Route::group(['middleware' => explode(',',config('content-builder-js.middlewares'))], function () {
    Route::post('/save-content-builder-page',['as'=>'template.save', 'uses' => 'Ksoft\ContentBuilderJs\Controllers\TemplateController@saveTemplatePage']);	// Saves pages templates.
    Route::get('/content-builder/edit/{page_id?}',['as'=>'template.edit', 'uses' => 'Ksoft\ContentBuilderJs\Controllers\TemplateController@editTemplatePage']);	// Saves pages templates.
});
