<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug'];

    // Указываем, что slug нужно делать из поля "name"
    public function sluggable()
    {
        return [
            'source' => 'title',
        ];
    }
}
