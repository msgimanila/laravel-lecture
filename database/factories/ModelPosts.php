<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
	 protected $table = 'wp_posts';
	 public function Posts($query)
{
    return $query->Posts('wp_posts', 'asc');
}
}