<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey="id_comp";
    protected $table="companies";
    public $timestamps=false;

    public $fillable = ['name','slogan','address','ruc'];

    protected $hidden = ['pivot'];

    public function Address() {
        return $this->hasOne('App\Address','id_addr', 'address');
    }

    public function Contact()
    {
        return $this->hasMany('App\Contact', 'id_comp'); // modelo y clave foránea
    }

}
