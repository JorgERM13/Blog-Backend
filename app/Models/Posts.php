<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table= 'posts';
    protected $fillable =[
        'categoria_id',
        'titulo',
        'imagen',
        'resumen',
        'contenido',
        'estado',
        'tags',
        'fecha_publicacion',
        'usaurio_id'
    ];

    //Relacion con categorías

    public function categoria(){
        return $this->belongsTo(Categorias::class,'categoria_id');
    }

    //Relacion con usuarios

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id');
    }

    //Obtener la imagen
    public function getImagenUrl(){
        if($this->imagen && $this->imagen !='default.png' && $this->imagen !=null){
            return asset('imagenes/posts/' . $this->imagen);
        }else{
            return asset('default.png');
        }
    }

    //Relacion con comentarios
    public function comentarios(){
        return $this->hasMany(Comentarios::class,'post_id');
    }

}
