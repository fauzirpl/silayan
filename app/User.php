<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id',
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
     * Edit profil user kecuali foto profil.
     *
     * @param  string $name, $email, $password
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateProfilWithoutPhoto($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $password, $id)
    {
        $data = \App\User::find($id);
        $data->name=$name;
        $data->nohp=$nohp;
        $data->noktp=$noktp;
        $data->nonelayan=$nonelayan;
        $data->alamat=$alamat;
        $data->kecamatan=$kecamatan;
        $data->koordinat=$koordinat;
        $data->password=bcrypt($password);
        $data->save();
        return 1;
    }

    /**
     * Edit profil user kecuali foto dan password.
     *
     * @param  string $name, $email, $password
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public static function updateProfilWithoutPasswordAndPhoto($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $id)
    {
        $data = \App\User::find($id);
        $data->name=$name;
        $data->nohp=$nohp;
        $data->noktp=$noktp;
        $data->nonelayan=$nonelayan;
        $data->alamat=$alamat;
        $data->kecamatan=$kecamatan;
        $data->koordinat=$koordinat;
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
    public static function updateProfil($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $path, $password, $id)
    {
        $data = \App\User::find($id);
        $data->name=$name;
        $data->nohp=$nohp;
        $data->noktp=$noktp;
        $data->nonelayan=$nonelayan;
        $data->alamat=$alamat;
        $data->kecamatan=$kecamatan;
        $data->koordinat=$koordinat;
        $data->password=bcrypt($password);
        $data->foto=$path;
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
    public static function updateProfilWithoutPassword($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $path, $id)
    {
        $data = \App\User::find($id);
        $data->name=$name;
        $data->nohp=$nohp;
        $data->noktp=$noktp;
        $data->nonelayan=$nonelayan;
        $data->alamat=$alamat;
        $data->kecamatan=$kecamatan;
        $data->koordinat=$koordinat;
        $data->foto=$path;
        $data->save();
        return 1;
    }
}
