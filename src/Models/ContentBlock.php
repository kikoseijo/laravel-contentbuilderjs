<?php

namespace Ksoft\ContentBuilderJs\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{

    public $table = 'cbldjs__blocks';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'img', 'css', 'js', 'html'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max_size:160',
        'html' => 'required'
    ];

}
