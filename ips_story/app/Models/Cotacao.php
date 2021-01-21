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
 * Class Cotacao
 * 
 * @property int $id
 * @property int $num_cotacao
 * @property int $empresa_id
 * @property int $cliente_id
 * @property int|null $validade
 * @property int $funcionario_id
 * @property int $termo_pagamento_id
 * @property Carbon|null $limite_pagamento
 * @property int|null $quantidade
 * @property float|null $preco_unitario
 * @property float|null $desconto
 * @property int $regime_pagamento_id
 * @property int $Regime_iva_id
 * @property float|null $subtotal
 * @property float|null $iva
 * @property float|null $total
 * @property string|null $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property RegimeIva $regime_iva
 * @property Cliente $cliente
 * @property Empresa $empresa
 * @property Funcionario $funcionario
 * @property RegimePagamento $regime_pagamento
 * @property TermoPagamento $termo_pagamento
 * @property Collection|ArtigoHasPreco[] $artigo_has_precos
 *
 * @package App\Models
 */
class Cotacao extends Model
{
	use SoftDeletes;
	protected $table = 'cotacao';

	protected $casts = [
		'num_cotacao' => 'int',
		'empresa_id' => 'int',
		'cliente_id' => 'int',
		'validade' => 'int',
		'funcionario_id' => 'int',
		'termo_pagamento_id' => 'int',
		'quantidade' => 'int',
		'preco_unitario' => 'float',
		'desconto' => 'float',
		'regime_pagamento_id' => 'int',
		'Regime_iva_id' => 'int',
		'subtotal' => 'float',
		'iva' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'limite_pagamento'
	];

	protected $fillable = [
		'num_cotacao',
		'empresa_id',
		'cliente_id',
		'validade',
		'funcionario_id',
		'termo_pagamento_id',
		'limite_pagamento',
		'quantidade',
		'preco_unitario',
		'desconto',
		'regime_pagamento_id',
		'Regime_iva_id',
		'subtotal',
		'iva',
		'total',
		'estado'
	];

	public function regime_iva()
	{
		return $this->belongsTo(RegimeIva::class, 'Regime_iva_id');
	}

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

	public function regime_pagamento()
	{
		return $this->belongsTo(RegimePagamento::class);
	}

	public function termo_pagamento()
	{
		return $this->belongsTo(TermoPagamento::class);
	}

	public function artigo_has_precos()
	{
		return $this->belongsToMany(ArtigoHasPreco::class, 'cotacao_has_artigo_has_preco')
					->withPivot('id', 'preço', 'quantidade', 'deleted_at')
					->withTimestamps();
	}
}
