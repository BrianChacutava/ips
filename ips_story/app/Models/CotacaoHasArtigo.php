<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CotacaoHasArtigo
 * 
 * @property int $id
 * @property int $cotacao_id
 * @property int $artigo_id
 * @property float|null $preço
 * @property float|null $quantidade
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Artigo $artigo
 * @property Cotacao $cotacao
 *
 * @package App\Models
 */
class CotacaoHasArtigo extends Model
{
	use SoftDeletes;
	protected $table = 'cotacao_has_artigo';

	protected $casts = [
		'cotacao_id' => 'int',
		'artigo_id' => 'int',
		'preço' => 'float',
		'quantidade' => 'float'
	];

	protected $fillable = [
		'cotacao_id',
		'artigo_id',
		'preço',
		'quantidade'
	];

	public function artigo()
	{
		return $this->belongsTo(Artigo::class);
	}

	public function cotacao()
	{
		return $this->belongsTo(Cotacao::class);
	}
}
