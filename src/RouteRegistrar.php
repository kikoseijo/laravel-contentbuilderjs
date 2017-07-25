<?php

namespace Ksoft\ContentBuilderJs;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar
{
    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;
    protected $custom_middlewares;

    /**
     * Create a new route registrar instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->custom_middlewares = explode(',', config('content-builder-js.middlewares'));
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     *
     * @return void
     */
    public function all()
    {
        $this->forTemplates();
        $this->forImageSaving();
        $this->forBlockBuilder();
    }

    /**
     * Register the routes needed for authorization.
     *
     * @return void
     */
    public function forTemplates()
    {
        $this->router->group(['middleware' => $this->custom_middlewares], function ($router) {

            $router->post('/template/save/{page_id?}',[
                'as'=>'cb_template.save',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\TemplateController@save'
            ]);	// Save Template

            $router->get('/template/edit/{page_id?}',[
                'as'=>'cb_template.edit',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\TemplateController@edit'
            ]);	// Edit

            $router->get('/templates',[
                'as'=>'cb_template.list',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\TemplateController@list'
            ]);	// List

            $router->get('/template/{page_id}/delete',[
                'as'=>'cb_template.delete',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\TemplateController@delete'
            ]);	// Delete

        });
    }
    /**
     * Register the routes needed for authorization.
     *
     * @return void
     */
    public function forImageSaving()
    {
        //Disable CSRX Protection on this one as we cant tune the saveimage_plugin js.
        $midelwares = $this->custom_middlewares;
        foreach (array_keys($midelwares, 'web') as $key) {
            unset($midelwares[$key]);
        }
        $this->router->group(['middleware' => $midelwares], function ($router) {
            $router->post('/template-image/save/{block_id?}',[
                'as'=>'cb_template.save_image',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\SaveImageController@save'
            ]);	// Save Images
        });
    }

    /**
     * Register the routes for retrieving and issuing access tokens.
     *
     * @return void
     */
    public function forBlockBuilder()
    {
        $this->router->group(['middleware' => $this->custom_middlewares], function ($router) {

            $router->post('/block/save/{block_id?}',[
                'as'=>'cb_block.save',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\BlockController@save'
            ]);	// Save

            $router->get('/block/edit/{block_id?}',[
                'as'=>'cb_block.edit',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\BlockController@edit'
            ]);	// Edit

            $router->get('/blocks',[
                'as'=>'cb_block.list',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\BlockController@list'
            ]);	// List

            $router->get('/block/{block_id}/delete',[
                'as'=>'cb_block.delete',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\BlockController@delete'
            ]);	// Delete

        });
    }
}
