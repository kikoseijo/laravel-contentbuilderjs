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

    /**
     * Create a new route registrar instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     *
     * @return void
     */
    public function all()
    {
        $this->forTemplates();
        $this->forBlockBuilder();
    }

    /**
     * Register the routes needed for authorization.
     *
     * @return void
     */
    public function forTemplates()
    {
        $this->router->group(['middleware' => explode(',', config('content-builder-js.middlewares'))], function ($router) {

            $router->post('/save/{page_id?}',[
                'as'=>'cb_template.save',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\TemplateController@saveTemplatePage'
            ]);	// Saves pages templates.

            $router->get('/edit/{page_id?}',[
                'as'=>'cb_template.edit',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\TemplateController@editTemplatePage'
            ]);	// Saves pages templates.

            $router->get('/templates',[
                'as'=>'cb_template.list',
                'uses' => '\Ksoft\ContentBuilderJs\Controllers\TemplateController@listTemplates'
            ]);	// Saves pages templates.

        });
    }

    /**
     * Register the routes for retrieving and issuing access tokens.
     *
     * @return void
     */
    public function forBlockBuilder()
    {

    }
}
