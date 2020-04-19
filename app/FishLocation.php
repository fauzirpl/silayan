<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FishLocation extends Model
{
    /**
     * Add new fish location to show at map.
     *
     * @param  string $id_fish, $koordinat, $id_user
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function addFishLocation($id_fish, $koordinat, $id_user)
    {
        $data = new \App\FishLocation;
        $data->id_fish=$id_fish;
        $data->koordinat=$koordinat;
        $data->id_user=$id_user;
        $data->save();
        return 1;
    }
}
