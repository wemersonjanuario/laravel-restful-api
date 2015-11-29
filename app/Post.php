<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Base
{
    protected $table = 'post';
    protected $primaryKey = 'post_id';
    protected $guarded = array();
    public static $rules = array();

    const CREATED_AT = 'post_created_at';
    const UPDATED_AT = 'post_updated_at';


    public static function baseQuery()
    {
        $query = self::select(array(
            '*'
        ));

        return $query;
    }

    public function comments()
    {
    return $this->hasMany('App\Comment', 'comment_post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'comment_user_id');
    }
}
