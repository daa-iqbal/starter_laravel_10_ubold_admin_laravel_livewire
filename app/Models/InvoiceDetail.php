<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InvoiceDetail extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = [];
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


    public function barang(){
        return $this->hasMany('App\Models\Barang', 'id', 'barang_id');
    }

    public function invoice(){
        return $this->belongsTo('App\Models\Invoice','invoice_id','id');
    }
}
