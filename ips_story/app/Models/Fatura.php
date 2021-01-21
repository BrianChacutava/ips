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
 * Class Fatura
 * 
 * @property int $id
 * @property string|null $numero_fatura
 * @property int $empresa_id
 * @property int $cliente_id
 * @property string|null $estado_pagamento
 * @property int|null $moeda_id
 * @property Carbon|null $data_vencimento
 * @property int|null $regime_pagamento_id
 * @property int $funcionario_id
 * @property int|null $taxa
 * @property float|null $Incidencia
 * @property float|null $total_iva
 * @property float|null $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Cliente $cliente
 * @property Empresa $empresa
 * @property Funcionario $funcionario
 * @property Moeda|null $moeda
 * @property RegimePagamento|null $regime_pagamento
 * @property Collection|Artigo[] $artigos
 *
 * @package App\Models
 */
class Fatura extends Model
{
	use SoftDeletes;
	protected $table = 'fatura';

	protected $casts = [
		'empresa_id' => 'int',
		'cliente_id' => 'int',
		'moeda_id' => 'int',
		'regime_pagamento_id' => 'int',
		'funcionario_id' => 'int',
		'taxa' => 'int',
		'Incidencia' => 'float',
		'total_iva' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'data_vencimento'
	];

	protected $fillable = [
		'numero_fatura',
		'empresa_id',
		'cliente_id',
		'estado_pagamento',
		'moeda_id',
		'data_vencimento',
		'regime_pagamento_id',
		'funcionario_id',
		'taxa',
		'Incidencia',
		'total_iva',
		'total'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

	public function empresa()
	{
		return $this->belongsTo(Empresa::class);
	}

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class);
	}

	public function moeda()
	{
		return $this->belongsTo(Moeda::class);
	}

	public function regime_pagamento()
	{
		return $this->belongsTo(RegimePagamento::class);
	}

	public function artigos()
	{
		return $this->belongsToMany(Artigo::class, 'fatura_has_artigo')
					->withPivot('id', 'quantidade', 'desconto', 'valor', 'valor_iva', 'deleted_at')
					->withTimestamps();
	}
}
