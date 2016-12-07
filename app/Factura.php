<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articulo;

class Factura extends Model
{
    protected $table ='factura';
	protected $primaryKey = 'idfactura'; 	
	protected $fillable = ['idcliente', 'idarticulo', 'fechaemision', 'ordencompra', 'documentoreferencial', 'guiaremision', 'condicionventa', 'cantidad', 'preciounitario', 'descuento', 'igv', 'estado'];
	public $timestamps = false;
	public $incrementing = false;

	public function articulos()
	{
		return $this->hasMany(Articulo::class, 'idarticulo', 'idarticulo');
	}

	public function cliente()
	{
		return $this->belongsTo(Articulo::class, 'idcliente');
	}
}
