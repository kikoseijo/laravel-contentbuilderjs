<?php

namespace Ksoft\ContentBuilderJs\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;


class SaveImageController extends BaseController
{
    use AuthorizesRequests;

    public function save(Request $request)
    {
        header('Cache-Control: no-cache, must-revalidate');

        //Specify url path
        $path = config('content-builder-js.storage_path') . 'media/';

        //Read image
        $count = $_REQUEST['count'];
        $b64str = $_REQUEST['hidimg-' . $count];
        $imgname = $_REQUEST['hidname-' . $count];
        $imgtype = $_REQUEST['hidtype-' . $count];

        //Generate random file name here
        if($imgtype == 'png'){
        	$image = $imgname . '-' . base_convert(rand(),10,36) . '.png';
        } else {
        	$image = $imgname . '-' . base_convert(rand(),10,36) . '.jpg';
        }

        //Save image
        $success = file_put_contents($path . $image, base64_decode($b64str));
        if ($success === FALSE) {
          if (!file_exists($path)) {
            return "<html><body onload=\"alert('Saving image to folder failed. Folder ".$path." not exists.')\"></body></html>";
          } else {
            return "<html><body onload=\"alert('Saving image to folder failed. Please check write permission on " .$path. "')\"></body></html>";
          }
        } else {
          //Replace image src with the new saved file
          return "<html><body onload=\"parent.document.getElementById('img-" . $count . "').setAttribute('src','" . $path . $image . "');  parent.document.getElementById('img-" . $count . "').removeAttribute('id') \"></body></html>";
        }

    }

}
