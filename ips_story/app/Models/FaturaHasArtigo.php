<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FaturaHasArtigo
 * 
 * @property int $id
 * @property int $fatura_id
 * @property int $artigo_id
 * @property int|null $quantidade
 * @property float|null $desconto
 * @property float|null $valor
 * @property float|null $valor_iva
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Artigo $artigo
 * @property Fatura $fatura
 *
 * @package App\Models
 */
class FaturaHasArtigo extends Model
{
	use SoftDeletes;
	protected $table = 'fatura_has_artigo';

	protected $casts = [
		'fatura_id' => 'int',
		'artigo_id' => 'int',
		'quantidade' => 'int',
		'desconto' => 'float',
		'valor' => 'float',
		'valor_iva' => 'float'
	];

	protected $fillable = [
		'fatura_id',
		'artigo_id',
		'quantidade',
		'desconto',
		'valor',
		'valor_iva'
	];

	public function artigo()
	{
		return $this->belongsTo(Artigo::class);
	}

	public function fatura()
	{
		return $this->belongsTo(Fatura::class);
	}
}
