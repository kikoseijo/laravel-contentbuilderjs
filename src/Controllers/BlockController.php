<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Intervention\Image\Facades\Image;
use Ksoft\ContentBuilderJs\Models\ContentBlock;
use Mews\Purifier\Facades\Purifier;

class BlockController extends BaseController
{
    use AuthorizesRequests;

    public function list()
    {
        $blocks = ContentBlock::all();
        return view('content-builder-js::block_list', compact('blocks'));
    }

    public function save(Request $request, $block_id = '')
    {
        $inputs = $request->all();
        if ($block_id>0) {
            $block = ContentBlock::find($block_id);
        } else {
            $block = new ContentBlock();
        }

        $block_image = $request->file('item_image');
        if($block_image){
            $tmpFilePath = config('content-builder-js.storage_path_blocks');
            $hardPath =  str_slug($request['name'], '-').'-'.md5(rand(0,99999));
            $img = Image::make($block_image);
			$img->fit(194)->save($tmpFilePath.$hardPath.'.jpg');
			$block->img = $hardPath;
        }

        $block->name = $request->get('name');
        $block->js = $request->get('js');
        $block->css = $request->get('css');
        $block->html = Purifier::clean($_POST['html']);
        $block->save();

        session()->flash('status', 'Block saved succesfully');

        return redirect(route('cb_block.list'));
    }

    public function edit($block_id = '')
    {
        if ($block_id>0) {
            $block = ContentBlock::find($block_id);
        }
         return view('content-builder-js::block_edit', compact('block'));
    }

    public function delete($block_id)
    {
        if ($page_id>0) {
            $template = ContentTemplate::find($page_id);
            if ($template) {
                $template->delete();
                session()->flash('status', 'Template deleted succesfully');
            }
        }
        return back();
    }
}
