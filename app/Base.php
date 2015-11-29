<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{

    public static function baseQuery()
    {
        $query = self::select(array(
            '*'
        ));

        return $query;
    }

    public function filterByKey()
    {
        return $this->baseQuery()->where($this->getKeyName(), $this->getKey());
    }
}
