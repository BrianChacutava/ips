<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ArtigoHasPreco
 * 
 * @property int $id
 * @property int $artigo_id
 * @property int $preco_id
 * @property float|null $unidade_base
 * @property int $grupo_preco_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Artigo $artigo
 * @property GrupoPreco $grupo_preco
 * @property Preco $preco
 * @property Collection|Cotacao[] $cotacaos
 *
 * @package App\Models
 */
class ArtigoHasPreco extends Model
{
	use SoftDeletes;
	protected $table = 'artigo_has_preco';

	protected $casts = [
		'artigo_id' => 'int',
		'preco_id' => 'int',
		'unidade_base' => 'float',
		'grupo_preco_id' => 'int'
	];

	protected $fillable = [
		'artigo_id',
		'preco_id',
		'unidade_base',
		'grupo_preco_id'
	];

	public function artigo()
	{
		return $this->belongsTo(Artigo::class);
	}

	public function grupo_preco()
	{
		return $this->belongsTo(GrupoPreco::class);
	}

	public function preco()
	{
		return $this->belongsTo(Preco::class);
	}

	public function cotacaos()
	{
		return $this->hasMany(Cotacao::class);
	}
}
