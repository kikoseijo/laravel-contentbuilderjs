<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class TemplateController extends BaseController
{
    use AuthorizesRequests;

    public function saveTemplatePage(Request $request)
    {
        return $request::all();
    }
    public function editTemplatePage(Request $request, $page_id)
    {
         return view('content-builder-js::page_builder');
    }
}
