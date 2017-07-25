<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Ksoft\ContentBuilderJs\Models\ContentTemplate;
use Ksoft\ContentBuilderJs\Models\ContentBlock;
use Mews\Purifier\Facades\Purifier;

class TemplateController extends BaseController
{
    use AuthorizesRequests;

    public function list()
    {
        $templates = ContentTemplate::all();
        //$blocks = ContentBlock::all();
        return view('content-builder-js::page_list', compact('templates'));
    }

    public function save(Request $request, $page_id = '')
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
        $template->setPurifiedContent($_POST['hidContent']);
        // TODO: Make sure Purifier does full saving of all tags, having problems with iframe + div class, i style, i class.
        $template->html = $_POST['hidContent'];
        $template->save();

        session()->flash('status', 'Template saved succesfully');

        return redirect(route('cb_template.list'));
    }

    public function edit($page_id = '')
    {
        if ($page_id>0) {
            $template = ContentTemplate::find($page_id);
        }
         return view('content-builder-js::page_builder', compact('template'));
    }

    public function delete($page_id)
    {
        if ($page_id>0) {
            // TODO: Delete all template images.
            $template = ContentTemplate::find($page_id);
            if ($template) {
                $template->delete();
                session()->flash('status', 'Template deleted succesfully');
            }
        }
        return back();
    }
}
