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
 * Class Artigo
 * 
 * @property int $id
 * @property string|null $artigo
 * @property string|null $descricao
 * @property string|null $unidade_base
 * @property string|null $tipo_artigo
 * @property string|null $foto
 * @property string|null $marca
 * @property string|null $modelo_marca
 * @property string|null $codigo_barras
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Preco[] $precos
 * @property Collection|Fatura[] $faturas
 *
 * @package App\Models
 */
class Artigo extends Model
{
	use SoftDeletes;
	protected $table = 'artigo';

	protected $fillable = [
		'artigo',
		'descricao',
		'unidade_base',
		'tipo_artigo',
		'foto',
		'marca',
		'modelo_marca',
		'codigo_barras'
	];

	public function precos()
	{
		return $this->belongsToMany(Preco::class, 'artigo_has_preco')
					->withPivot('id', 'unidade_base', 'grupo_preco_id', 'deleted_at')
					->withTimestamps();
	}

	public function faturas()
	{
		return $this->belongsToMany(Fatura::class, 'fatura_has_artigo')
					->withPivot('id', 'quantidade', 'desconto', 'valor', 'valor_iva', 'deleted_at')
					->withTimestamps();
	}
}
