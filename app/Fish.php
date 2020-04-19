<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    /**
     * Add new fish species to silayan.
     *
     * @param  string $name, $email, $password, $path
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function addFish($name, $path)
    {
        $data = new \App\Fish;
        $data->name=$name;
        $data->image=$path;
        $data->save();
        return 1;
    }

    /**
     * Edit fish information.
     *
     * @param  string $name, $path
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateFish($name, $path, $id)
    {
        $data = \App\Fish::find($id);
        $data->name=$name;
        $data->image=$path;
        $data->save();
        return 1;
    }

    /**
     * Edit fish information without image.
     *
     * @param  string $name
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateFishWithoutImage($name, $id)
    {
        $data = \App\Fish::find($id);
        $data->name=$name;
        $data->save();
        return 1;
    }
}
