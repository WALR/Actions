<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class casa extends Model
{
		protected $table = 'casas';
    protected $fillable = ['nombre', 'color_id'];


    public function color()
    {
        return $this->belongsTo('App\colores');
        // return $this->hasOne('App\Phone');
    }
}
