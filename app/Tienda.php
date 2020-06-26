<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Tienda extends Model
{
    protected $table = 'tiendas';
    protected $primaryKey = 'id_tienda';
    protected $fillable = ['nombre', 'descripcion', 'imagen'];
    public $timestamps = false;
}
?>