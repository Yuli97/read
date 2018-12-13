<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey="id_addr";
    protected $table="addresses";
    protected $fillable = ['id_addr_m', 'description'];
    public $timestamps=false;

}
