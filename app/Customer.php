<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $guarded = array('id', 'customer_id');
    public static $rules = array();

    const CREATED_AT = 'customer_created_at';
    const UPDATED_AT = 'customer_updated_at';



    public static function baseQuery()
    {
        $query = self::select(array(
            '*'
        ));

        return $query;
    }



}
