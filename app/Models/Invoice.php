<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
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


    public function invoice_details(){
        return $this->hasMany('App\Models\InvoiceDetail', 'invoice_id', 'id');
    }

    public function pasien(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
