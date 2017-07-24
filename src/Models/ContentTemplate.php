<?php

namespace Ksoft\ContentBuilderJs\Models;

use Eloquent as Model;

class ContentTemplate extends Model
{

    public $table = 'cbldjs__templates';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'title', 'url', 'body', 'lang', 'short_text'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max_size:160',
        'title' => 'required|max_size:160',
        'url' => 'optional|max_size:160',
        'body' => 'required'
    ];

}
