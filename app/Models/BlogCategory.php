<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description',
        ];

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???'
            );

        return $title;
    }

    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

    /**
     * Пример аксесуара
     *
     * @param $valueFromObject
     * @return bool|false|mixed|string|string[]|null
     */
    public function getTitleAttribute($valueFromObject)
    {
        return mb_strtoupper($valueFromObject);
    }

    /**
     * Пример мутатора
     *
     * @param $incomingValue
     */
    public function setTitleAttribute($incomingValue)
    {
        $this->attributes['title'] = $incomingValue();
    }
}
