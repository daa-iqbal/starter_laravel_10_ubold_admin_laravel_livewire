<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait,SoftDeletes;
    use HasApiTokens,Notifiable;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'kode',
        'email',
        'email_verified_at',
        'password',
        'current_apk_version_name',
        'current_apk_version_code',
        'file_id',
        'token_login_mobile',
        'token_login_mobile_kadaluarsa',
        'master_paket_id',
        'phone',
        'phone_verified_at',
        'token_firebase',
        'is_active',
        'built_in',
        'last_signedin',
        'last_access',
        'last_update_location',
        'latitude',
        'longitude',
        'device_info',
        'created_by_id',
        'updated_by_id',
        'deleted_by_id',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',

    ];
    //protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
     /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }



}
