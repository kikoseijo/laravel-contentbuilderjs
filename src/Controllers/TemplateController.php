<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Ksoft\ContentBuilderJs\Models\ContentTemplate;
use Mews\Purifier\Facades\Purifier;

class TemplateController extends BaseController
{
    use AuthorizesRequests;

    public function listTemplates(Request $request)
    {
        $templates = ContentTemplate::all();
        return view('content-builder-js::page_list', compact('templates'));

    }

    public function saveTemplatePage(Request $request, $page_id = '')
    {
        $inputs = $request->all();
        if ($page_id>0) {
            $template = ContentTemplate::find($page_id);

        } else {
            $template = new ContentTemplate();
        }

        $template->name = $request->get('hidName');
        $template->title = $request->get('hidTitle');
        $template->url = $request->get('hidUrl');
        $template->body = $request->get('hidContent');
        $template->setPurifiedContent($request->get('hidContent'));

        $template->save();

        session()->flash('status', trans('ticketit::lang.the-ticket-has-been-created'));

        return redirect(route('cb_template.list'));
    }

    public function editTemplatePage(Request $request, $page_id = '')
    {
        if ($page_id>0) {
            $template = ContentTemplate::find($page_id);
        }
         return view('content-builder-js::page_builder', compact('template'));
    }
}
