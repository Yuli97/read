<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactKind extends Model
{
    protected $primaryKey="id_cont_k";
    protected $table="contact_kinds";
    public $timestamps=false;

    public $fillable = ['description'];

    public function Contact()
    {
        return $this->hasMany('\App\Contact', 'id_cont_k'); // modelo y clave foránea
    }
}
