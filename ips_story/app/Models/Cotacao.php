<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
 * @property int $artigo_has_preco_id
 * @property int|null $quantidade
 * @property float|null $preco_unitario
 * @property float|null $desconto
 * @property float|null $subtotal
 * @property float|null $iva
 * @property float|null $total
 * @property string|null $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ArtigoHasPreco $artigo_has_preco
 * @property Cliente $cliente
 * @property Empresa $empresa
 * @property Funcionario $funcionario
 * @property TermoPagamento $termo_pagamento
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
		'artigo_has_preco_id' => 'int',
		'quantidade' => 'int',
		'preco_unitario' => 'float',
		'desconto' => 'float',
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
		'artigo_has_preco_id',
		'quantidade',
		'preco_unitario',
		'desconto',
		'subtotal',
		'iva',
		'total',
		'estado'
	];

	public function artigo_has_preco()
	{
		return $this->belongsTo(ArtigoHasPreco::class);
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

	public function termo_pagamento()
	{
		return $this->belongsTo(TermoPagamento::class);
	}
}
