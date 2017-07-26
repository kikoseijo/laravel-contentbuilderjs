<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Ksoft\ContentBuilderJs\Models\ContentBlock;
use Mews\Purifier\Facades\Purifier;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
            $path =  $tmpFilePath . str_slug($request['name'], '-').'-'.md5(rand(0,99999)).'.jpg';
            $img = Image::make($block_image)->fit(194);
            Storage::put($path, (string) $img->encode(), 'public');
			$block->img = $path;
        }

        $block->name = $request->get('name');
        $block->category_id = $request->get('category_id');
        $block->js = $request->get('js');
        $block->css = $request->get('css');
        $block->html = Purifier::clean($_POST['html']);
        $block->save();

        $this->updateSnippets();

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

    protected function updateSnippets(){

        $blocks = ContentBlock::all();
        $snippetPath = config('content-builder-js.storage_path_snippets','public/block_snippets/');
        $snippetFile = $snippetPath . 'snippets.html';
        $cssFile = $snippetPath . 'content.css';
        $jsFile = $snippetPath . 'js.js';

        Storage::put($snippetFile, '<!-- <Today::> -->', 'public');
        Storage::put($cssFile, '<!-- <Today::> -->', 'public');
        Storage::put($jsFile, '<!-- <Today::> -->', 'public');
        // Append to a file
        foreach ($blocks as $block) {
            $newBlock = '<div data-thumb="'.$block->imgUrl().'">' . "\n";
            $newBlock .= '   <div>' . "\n";
            $newBlock .= '       ' . $block->html . "\n";
            $newBlock .= '   </div>' . "\n";
            $newBlock .= '</div>';
            Storage::append($snippetFile, $htmlBlock);
            Storage::append($cssFile, $block->css);
            Storage::append($jsFile, $block->js);
        }
    }
}
