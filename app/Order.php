<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Base
{

    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $guarded = array('id', 'order_id');
    public static $rules = array();

    const CREATED_AT = 'order_created_at';
    const UPDATED_AT = 'order_updated_at';



    public static function baseQuery()
    {
        $query = self::select(array(
            '*'
        ));

        return $query;
    }



}
