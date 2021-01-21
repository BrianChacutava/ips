<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CotacaoHasArtigoHasPreco
 * 
 * @property int $id
 * @property int $cotacao_id
 * @property int $artigo_has_preco_id
 * @property float|null $preço
 * @property float|null $quantidade
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property ArtigoHasPreco $artigo_has_preco
 * @property Cotacao $cotacao
 *
 * @package App\Models
 */
class CotacaoHasArtigoHasPreco extends Model
{
	use SoftDeletes;
	protected $table = 'cotacao_has_artigo_has_preco';

	protected $casts = [
		'cotacao_id' => 'int',
		'artigo_has_preco_id' => 'int',
		'preço' => 'float',
		'quantidade' => 'float'
	];

	protected $fillable = [
		'cotacao_id',
		'artigo_has_preco_id',
		'preço',
		'quantidade'
	];

	public function artigo_has_preco()
	{
		return $this->belongsTo(ArtigoHasPreco::class);
	}

	public function cotacao()
	{
		return $this->belongsTo(Cotacao::class);
	}
}
