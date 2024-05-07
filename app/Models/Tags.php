<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $table= 'tags';

    protected $fillable =[
        'nombre',
        'estado',
        'usuario_id'
    ];

    //Relacion con los usuarios
    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
