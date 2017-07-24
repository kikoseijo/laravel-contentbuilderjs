<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Ksoft\ContentBuilderJs\Models\ContentTemplate;

class TemplateController extends BaseController
{
    use AuthorizesRequests;

    public function listTemplates(Request $request)
    {
        $templates = ContentTemplate::all();
        return view('content-builder-js::page_list', compact('templates'));

    }

    public function saveTemplatePage(Request $request)
    {
        return $request::all();
    }

    public function editTemplatePage(Request $request, $page_id = '')
    {
         return view('content-builder-js::page_builder');
    }
}
