<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FishCatch extends Model
{
    /**
     * Add new data of fish that catch by fishermen in one month.
     *
     * @param  string $total_catch, $id_user
     * @return \Illuminate\Http\Response
     */
    public static function addTotalCatch($total_catch, $id_user)
    {
        $data = new \App\FishCatch;
        $data->total_catch=$total_catch;
        $data->id_user=$id_user;
        $data->save();
        return 1;
    }
}
