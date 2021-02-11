<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Desspesa
 * 
 * @property int $id
 * @property string|null $referencia
 * @property int|null $tipo_despesa_id
 * @property int|null $pago
 * @property float|null $taxa_cambio
 * @property string|null $observacao
 * @property int|null $fornecedor_id
 * @property int|null $moeda_id
 * @property int|null $metode_pagamento_id
 * @property int|null $caixa_id
 * @property int|null $Regime_iva_id
 * @property int|null $empresa_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property RegimeIva|null $regime_iva
 * @property Caixa|null $caixa
 * @property Empresa|null $empresa
 * @property Fornecedor|null $fornecedor
 * @property MetodePagamento|null $metode_pagamento
 * @property Moeda|null $moeda
 * @property TipoDespesa|null $tipo_despesa
 *
 * @package App\Models
 */
class Desspesa extends Model
{
	use SoftDeletes;
	protected $table = 'desspesa';

	protected $casts = [
		'tipo_despesa_id' => 'int',
		'pago' => 'int',
		'taxa_cambio' => 'float',
		'fornecedor_id' => 'int',
		'moeda_id' => 'int',
		'metode_pagamento_id' => 'int',
		'caixa_id' => 'int',
		'Regime_iva_id' => 'int',
		'empresa_id' => 'int'
	];

	protected $fillable = [
		'referencia',
		'tipo_despesa_id',
		'pago',
		'taxa_cambio',
		'observacao',
		'fornecedor_id',
		'moeda_id',
		'metode_pagamento_id',
		'caixa_id',
		'Regime_iva_id',
		'empresa_id'
	];

	public function regime_iva()
	{
		return $this->belongsTo(RegimeIva::class, 'Regime_iva_id');
	}

	public function caixa()
	{
		return $this->belongsTo(Caixa::class);
	}

	public function empresa()
	{
		return $this->belongsTo(Empresa::class);
	}

	public function fornecedor()
	{
		return $this->belongsTo(Fornecedor::class);
	}

	public function metode_pagamento()
	{
		return $this->belongsTo(MetodePagamento::class);
	}

	public function moeda()
	{
		return $this->belongsTo(Moeda::class);
	}

	public function tipo_despesa()
	{
		return $this->belongsTo(TipoDespesa::class);
	}
}
