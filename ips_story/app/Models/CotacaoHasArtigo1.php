<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CotacaoHasArtigo1
 * 
 * @property int $id
 * @property int $cotacao_id
 * @property int $artigo_id
 * @property float|null $preco
 * @property int|null $quantidade
 * @property float|null $desconto
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property float|null $total
 * 
 * @property Artigo $artigo
 * @property Cotacao $cotacao
 *
 * @package App\Models
 */
class CotacaoHasArtigo1 extends Model
{
	use SoftDeletes;
	protected $table = 'cotacao_has_artigo1';

	protected $casts = [
		'cotacao_id' => 'int',
		'artigo_id' => 'int',
		'preco' => 'float',
		'quantidade' => 'int',
		'desconto' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'cotacao_id',
		'artigo_id',
		'preco',
		'quantidade',
		'desconto',
		'total'
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
