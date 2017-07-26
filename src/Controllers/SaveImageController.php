<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SaveImageController extends BaseController
{
    use AuthorizesRequests;

    public function save(Request $request)
    {
        header('Cache-Control: no-cache, must-revalidate');

        //Specify url path
        $path = config('content-builder-js.storage_path_images');

        //Read image
        $count = $request->get('count');
        $b64str = $request->get('hidimg-'.$count);
        $imgname = $request->get('hidname-'.$count);
        $imgtype = $request->get('hidtype-'.$count);

        //Generate random file name here
        if ($imgtype == 'png') {
            $image = $request->get('hidname-'.$count).'-'.base_convert(rand(), 10, 36).'.png';
        } else {
            $image = $imgname.'-'.base_convert(rand(), 10, 36).'.jpg';
        }

        // Save image
        Storage::put($path.$image, base64_decode($b64str), 'public');
        if (Storage::exists($path.$image)) {
            $url = Storage::url($path.$image);
            echo "<html><body onload=\"parent.document.getElementById('img-".$count."').setAttribute('src','".$url."');  parent.document.getElementById('img-".$count."').removeAttribute('id') \"></body></html>";
        } else {
            echo "<html><body onload=\"alert('Saving image to folder failed. Folder ".$path." not exists.')\"></body></html>";
        }
    }
}
