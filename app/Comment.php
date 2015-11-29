<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Base
{
    protected $table = 'comment';
    protected $primaryKey = 'comment_id';
    protected $guarded = array();
    public static $rules = array();

    const CREATED_AT = 'comment_created_at';
    const UPDATED_AT = 'comment_updated_at';



    public static function baseQuery()
    {
        $query = self::select(array(
            '*'
        ));

        return $query;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'comment_user_id');
    }
}
