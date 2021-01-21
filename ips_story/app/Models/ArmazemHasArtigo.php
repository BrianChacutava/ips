<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ArmazemHasArtigo
 * 
 * @property int $id
 * @property int|null $armazem_id
 * @property int|null $artigo_id
 * @property float|null $quantidade
 * @property float|null $valor_entrada
 * @property string|null $entrada
 * @property string|null $saida
 * @property float|null $stock_min
 * @property float|null $stock_max
 * @property float|null $saldo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Armazem|null $armazem
 * @property Artigo|null $artigo
 *
 * @package App\Models
 */
class ArmazemHasArtigo extends Model
{
	use SoftDeletes;
	protected $table = 'armazem_has_artigo';

	protected $casts = [
		'armazem_id' => 'int',
		'artigo_id' => 'int',
		'quantidade' => 'float',
		'valor_entrada' => 'float',
		'stock_min' => 'float',
		'stock_max' => 'float',
		'saldo' => 'float'
	];

	protected $fillable = [
		'armazem_id',
		'artigo_id',
		'quantidade',
		'valor_entrada',
		'entrada',
		'saida',
		'stock_min',
		'stock_max',
		'saldo'
	];

	public function armazem()
	{
		return $this->belongsTo(Armazem::class);
	}

	public function artigo()
	{
		return $this->belongsTo(Artigo::class);
	}
}
