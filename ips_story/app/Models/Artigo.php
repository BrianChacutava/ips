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
 * @property int $tipo_artigo_id
 * @property string|null $foto
 * @property int $unidade_base_id
 * @property string|null $marca
 * @property string|null $modelo_marca
 * @property string|null $codigo_barras
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $conta de rendimento_id
 * 
 * @property TipoArtigo $tipo_artigo
 * @property UnidadeBase $unidade_base
 * @property Collection|Armazem[] $armazems
 * @property Collection|Preco[] $precos
 * @property Collection|Venda[] $vendas
 * @property Collection|Fatura[] $faturas
 *
 * @package App\Models
 */
class Artigo extends Model
{
	use SoftDeletes;
	protected $table = 'artigo';

	protected $casts = [
		'tipo_artigo_id' => 'int',
		'unidade_base_id' => 'int',
		'conta de rendimento_id' => 'int'
	];

	protected $fillable = [
		'artigo',
		'descricao',
		'tipo_artigo_id',
		'foto',
		'unidade_base_id',
		'marca',
		'modelo_marca',
		'codigo_barras',
		'conta de rendimento_id'
	];

	public function tipo_artigo()
	{
		return $this->belongsTo(TipoArtigo::class);
	}

	public function unidade_base()
	{
		return $this->belongsTo(UnidadeBase::class);
	}

	public function armazems()
	{
		return $this->belongsToMany(Armazem::class, 'armazem_has_artigo')
					->withPivot('id', 'quantidade', 'valor_entrada', 'entrada', 'saida', 'stock_min', 'stock_max', 'saldo', 'deleted_at')
					->withTimestamps();
	}

	public function precos()
	{
		return $this->belongsToMany(Preco::class, 'artigo_has_preco')
					->withPivot('id', 'quantidade', 'grupo_preco_id', 'deleted_at')
					->withTimestamps();
	}

	public function vendas()
	{
		return $this->belongsToMany(Venda::class, 'artigo_has_venda')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function faturas()
	{
		return $this->belongsToMany(Fatura::class, 'fatura_has_artigo')
					->withPivot('id', 'quantidade', 'desconto', 'valor', 'valor_iva', 'deleted_at')
					->withTimestamps();
	}
}
