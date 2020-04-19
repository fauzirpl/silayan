<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FishPrice extends Model
{
    /**
     * Add update price of fish.
     *
     * @param  string $area, id_fish, $price
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function addPrice($area, $id_fish, $price)
    {
        $data = new \App\FishPrice;
        $data->area=$area;
        $data->id_fish=$id_fish;
        $data->price=$price;
        $data->save();
        return 1;
    }
}
