<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey="id_cont";
    protected $table="contacts";
    public $timestamps=false;

    public $fillable = ['id_cont_k','id_comp','description'];

    public function KindCont() {
        return $this->belongsTo('\App\ContactKind', 'id_cont_k');
    }

    public function Company() {
        return $this->belongsTo('\App\Company', 'id_comp');
    }
}
