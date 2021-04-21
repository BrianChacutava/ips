<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Preco
 * 
 * @property int $id
 * @property float|null $preco
 * @property int|null $grupo_preco_id
 * @property int|null $artigo_id
 * @property float|null $quantidade
 * @property int|null $ativo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Artigo|null $artigo
 * @property GrupoPreco|null $grupo_preco
 *
 * @package App\Models
 */
class Preco extends Model
{
	use SoftDeletes;
	protected $table = 'preco';

	protected $casts = [
		'preco' => 'float',
		'grupo_preco_id' => 'int',
		'artigo_id' => 'int',
		'quantidade' => 'float',
		'ativo' => 'int'
	];

	protected $fillable = [
		'preco',
		'grupo_preco_id',
		'artigo_id',
		'quantidade',
		'ativo'
	];

	public function artigo()
	{
		return $this->belongsTo(Artigo::class);
	}

	public function grupo_preco()
	{
		return $this->belongsTo(GrupoPreco::class);
	}
}
