<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey="id_comp";
    protected $table="companies";
    public $timestamps=false;

    public $fillable = ['name','slogan','address','ruc'];

    public function Address() {
        return $this->hasOne('App\Address','id_addr', 'address');
    }

    public function Contact()
    {
        return $this->hasMany('\App\Contact', 'id_comp'); // modelo y clave foránea
    }

    public static function findAddress($array, $id_addr)
    {
        foreach ($array as $item) {
                if ($item->id_addr == $id_addr) {
                    info($item->id_addr);
                    info($id_addr);
                    return true;
                }
        }
        return false;
    }

}
