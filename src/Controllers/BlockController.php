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

            $baseSnippetPath = config('content-builder-js.default.snippetFile');
            //$baseCssPath = str_replace('/snippets', '/content',  str_replace('.html', '.css', $baseSnippetPath));

            $base_snippets = \File::get( public_path() . $baseSnippetPath);
            //$base_css = \File::get( public_path() . $baseCssPath);

            $snippetFile = $snippetPath . 'snippets.html';
            Storage::put($snippetFile, $base_snippets, 'public');

            $cssFile = $snippetPath . 'content.css';
            Storage::put($cssFile, '', 'public');

            $jsFile = $snippetPath . 'js.js';
            Storage::put($jsFile, '', 'public');
            // Append to a file
            $i=0;
            foreach ($blocks as $block) {
                $i++;
                $htmlBlock = '<div data-num="'.$i.'" data-thumb="'.$block->imgUrl().'" data-cat="'.$block->category_id.'">' . "\n";
                $htmlBlock .= '   <div>' . "\n";
                $htmlBlock .= '       ' . $block->html . "\n";
                $htmlBlock .= '   </div>' . "\n";
                $htmlBlock .= '</div>';
                Storage::append($snippetFile, $htmlBlock);
                Storage::append($cssFile, $block->css);
                Storage::append($jsFile, $block->js);
            }
        }
    protected function updateSnippets(){

        $blocks = ContentBlock::all();
        $snippetPath = config('content-builder-js.storage_path_snippets','public/block_snippets/');
        $baseSnippetPath = config('content-builder-js.default.snippetFile');
        $snippetFile = $snippetPath . 'snippets.html';
        $cssFile = $snippetPath . 'content.css';
        $jsFile = $snippetPath . 'js.js';
        $base_snippets = Storage::get($baseSnippetPath);
        Storage::put($snippetFile, $base_snippets, 'public');
        Storage::put($cssFile, '', 'public');
        Storage::put($jsFile, '', 'public');
        // Append to a file
        $i=0;
        foreach ($blocks as $block) {
            $i++;
            $htmlBlock = '<div data-num="'.$i.'" data-thumb="'.$block->imgUrl().'" data-cat="'.$block->category_id.'">' . "\n";
            $htmlBlock .= '   <div>' . "\n";
            $htmlBlock .= '       ' . $block->html . "\n";
            $htmlBlock .= '   </div>' . "\n";
            $htmlBlock .= '</div>';
            Storage::append($snippetFile, $htmlBlock);
            Storage::append($cssFile, $block->css);
            Storage::append($jsFile, $block->js);
        }
    }
}
