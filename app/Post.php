<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $fillable = [
    	 'title','description','thumbnail','category_id','slug',
    ];

    protected $dates = ["deleted_at"];

    public function getThumbnailAttribute($thumbnail)
    {
        return asset($thumbnail);
    }

    public function Category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }

    public function User(){
        return $this->belongsTo("App\User");
    }
}
