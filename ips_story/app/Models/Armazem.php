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
 * Class Armazem
 * 
 * @property int $id
 * @property string|null $armazem
 * @property string|null $descricao
 * @property int|null $permitir_entrada_material
 * @property int|null $permitir_saida_material
 * @property int|null $endereco_id
 * @property int|null $empresa_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Empresa|null $empresa
 * @property Endereco|null $endereco
 * @property Collection|Artigo[] $artigos
 *
 * @package App\Models
 */
class Armazem extends Model
{
	use SoftDeletes;
	protected $table = 'armazem';

	protected $casts = [
		'permitir_entrada_material' => 'int',
		'permitir_saida_material' => 'int',
		'endereco_id' => 'int',
		'empresa_id' => 'int'
	];

	protected $fillable = [
		'armazem',
		'descricao',
		'permitir_entrada_material',
		'permitir_saida_material',
		'endereco_id',
		'empresa_id'
	];

	public function empresa()
	{
		return $this->belongsTo(Empresa::class);
	}

	public function endereco()
	{
		return $this->belongsTo(Endereco::class);
	}

	public function artigos()
	{
		return $this->belongsToMany(Artigo::class, 'armazem_has_artigo')
					->withPivot('id', 'quantidade', 'valor_entrada', 'entrada', 'saida', 'stock_min', 'stock_max', 'saldo', 'deleted_at')
					->withTimestamps();
	}
}
