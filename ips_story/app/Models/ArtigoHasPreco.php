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
 * @property float|null $quantidade
 * @property int $grupo_preco_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
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
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'artigo_id' => 'int',
		'preco_id' => 'int',
		'quantidade' => 'float',
		'grupo_preco_id' => 'int'
	];

	protected $fillable = [
		'artigo_id',
		'preco_id',
		'quantidade',
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
		return $this->belongsToMany(Cotacao::class, 'cotacao_has_artigo_has_preco')
					->withPivot('id', 'preço', 'quantidade', 'deleted_at')
					->withTimestamps();
	}
}
