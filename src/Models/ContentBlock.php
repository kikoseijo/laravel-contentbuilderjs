<?php

namespace Ksoft\ContentBuilderJs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContentBlock extends Model
{
    public $table = 'cbldjs_blocks';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'img', 'css', 'js', 'html', 'category_id',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max_size:160',
        'html' => 'required',
    ];

    public function imgUrl($size = '194x91')
    {
        if ($this->img != '') {
            return Storage::url($this->img);
        } else {
            return 'http://placehold.it/'.$size.'?text='.$this->name;
        }
    }
}
