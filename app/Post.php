<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [

        'title',
        'subtitle',
        'author',
        'date',
        'description'
    ];

    public function category() {
        return $this -> belongsTo(Category::class);
    }
}
