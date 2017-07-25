<?php

namespace Ksoft\ContentBuilderJs\Models;

use Illuminate\Database\Eloquent\Model;
use Ksoft\ContentBuilderJs\Traits\Purifiable;

class ContentTemplate extends Model
{
    use Purifiable;

    public $table = 'CBLDJS__templates';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'title', 'url', 'html', 'lang', 'content'
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
