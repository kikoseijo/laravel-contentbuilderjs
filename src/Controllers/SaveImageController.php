<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SaveImageController extends BaseController
{
    use AuthorizesRequests;

    public function save(Request $request)
    {
        header('Cache-Control: no-cache, must-revalidate');

        //Specify url path
        $path = config('content-builder-js.storage_path') . 'media/';

        //Read image
        $count   = $request->get('count');
        $b64str  = $request->get('hidimg-' . $count);
        $imgname = $request->get('hidname-' . $count);
        $imgtype = $request->get('hidtype-' . $count);

        //Generate random file name here
        if($imgtype == 'png'){
        	$image = $request->get('hidname-' . $count) . '-' . base_convert(rand(),10,36) . '.png';
        } else {
        	$image = $imgname . '-' . base_convert(rand(),10,36) . '.jpg';
        }
        //Save image
        if (Storage::put($path . $image, base64_decode($b64str))) {
          if (!file_exists($path)) {
            echo "<html><body onload=\"alert('Saving image to folder failed. Folder ".$path." not exists.')\"></body></html>";
          } else {
            echo "<html><body onload=\"alert('Saving image to folder failed. Please check write permission on " .$path. "')\"></body></html>";
          }
        } else {
          //Replace image src with the new saved file
          echo "<html><body onload=\"parent.document.getElementById('img-" . $count . "').setAttribute('src','" . $path . $image . "');  parent.document.getElementById('img-" . $count . "').removeAttribute('id') \"></body></html>";
        }

    }

}
