<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{

    protected $table = 'funcionario';
    protected $primaryKey = 'funcionario_id';
    protected $guarded = array('id', 'funcionario_id');
    public static $rules = array();

    const CREATED_AT = 'funcionario_created_at';
    const UPDATED_AT = 'funcionario_updated_at';



    public static function baseQuery()
    {
        $query = self::select(array(
            '*'
        ));

        return $query;
    }



}
