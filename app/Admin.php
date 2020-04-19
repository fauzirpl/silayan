<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Add new admin to silayan.
     *
     * @param  string $name, $email, $password, $path
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function addAdmin($name, $email, $path, $password)
    {
        $data = new \App\Admin;
        $data->name=$name;
        $data->email=$email;
        $data->image=$path;
        $data->password=$password;
        $data->save();
        return 1;
    }

    /**
     * Edit profil admin kecuali foto profil.
     *
     * @param  string $name, $email, $password
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateProfilWithoutPhoto($name, $password, $id)
    {
        $data = \App\Admin::find($id);
        $data->name=$name;
        $data->password=bcrypt($password);
        $data->save();
        return 1;
    }

    /**
     * Edit profil admin kecuali foto dan password.
     *
     * @param  string $name, $email, $password
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateProfilWithoutPasswordAndPhoto($name ,$id)
    {
        $data = \App\Admin::find($id);
        $data->name=$name;
        $data->save();
        return 1;
    }

    /**
     * Edit profil user.
     *
     * @param  string $name, $email, $password
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateProfil($name, $path, $password, $id)
    {
        $data = \App\Admin::find($id);
        $data->name=$name;
        $data->password=bcrypt($password);
        $data->image=$path;
        $data->save();
        return 1;
    }

    /**
     * Edit profil user kecuali password.
     *
     * @param  string $name, $email, $password
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateProfilWithoutPassword($name, $path, $id)
    {
        $data = \App\Admin::find($id);
        $data->name=$name;
        $data->image=$path;
        $data->save();
        return 1;
    }
}
