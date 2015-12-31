<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Base
{

    protected $table = 'telefone';
    protected $primaryKey = 'telefone_id';
    protected $guarded = array('id', 'telefone_id');
    public static $rules = array();

    const CREATED_AT = 'telefone_created_at';
    const UPDATED_AT = 'telefone_updated_at';



    public static function baseQuery()
    {
        $query = self::select(array(
            '*'
        ));

        return $query;
    }



}
