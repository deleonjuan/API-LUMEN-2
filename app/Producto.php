<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'precio', 'id_tienda', 'imagen'];
    public $timestamps = false;
}
?>