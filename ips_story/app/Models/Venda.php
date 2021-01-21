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
 * Class Venda
 * 
 * @property int $id
 * @property int $Regime_iva_id
 * @property int $metode_pagamento_id
 * @property int $regime_pagamento_id
 * @property int $cliente_id
 * @property float|null $valor_final
 * @property int $funcionario_id
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property RegimeIva $regime_iva
 * @property Cliente $cliente
 * @property Funcionario $funcionario
 * @property MetodePagamento $metode_pagamento
 * @property RegimePagamento $regime_pagamento
 * @property Collection|Artigo[] $artigos
 *
 * @package App\Models
 */
class Venda extends Model
{
	use SoftDeletes;
	protected $table = 'venda';

	protected $casts = [
		'Regime_iva_id' => 'int',
		'metode_pagamento_id' => 'int',
		'regime_pagamento_id' => 'int',
		'cliente_id' => 'int',
		'valor_final' => 'float',
		'funcionario_id' => 'int'
	];

	protected $fillable = [
		'Regime_iva_id',
		'metode_pagamento_id',
		'regime_pagamento_id',
		'cliente_id',
		'valor_final',
		'funcionario_id',
		'descricao'
	];

	public function regime_iva()
	{
		return $this->belongsTo(RegimeIva::class, 'Regime_iva_id');
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class);
	}

	public function metode_pagamento()
	{
		return $this->belongsTo(MetodePagamento::class);
	}

	public function regime_pagamento()
	{
		return $this->belongsTo(RegimePagamento::class);
	}

	public function artigos()
	{
		return $this->belongsToMany(Artigo::class, 'artigo_has_venda')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
