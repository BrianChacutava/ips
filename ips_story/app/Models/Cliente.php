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
 * Class Cliente
 * 
 * @property int $id
 * @property string|null $nome
 * @property string|null $sigla
 * @property int|null $nuit
 * @property string|null $telefone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $foto
 * @property int|null $endereco_id
 * @property int|null $Regime_iva_id
 * @property int|null $regime_pagamento_id
 * @property int|null $metode_pagamento_id
 * @property int|null $moeda_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $gupo_cliente_id
 * @property int|null $blokeado
 * 
 * @property RegimeIva|null $regime_iva
 * @property Endereco|null $endereco
 * @property GupoCliente|null $gupo_cliente
 * @property MetodePagamento|null $metode_pagamento
 * @property Moeda|null $moeda
 * @property RegimePagamento|null $regime_pagamento
 * @property Collection|Cotacao[] $cotacaos
 * @property Collection|Fatura[] $faturas
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class Cliente extends Model
{
	use SoftDeletes;
	protected $table = 'cliente';

	protected $casts = [
		'nuit' => 'int',
		'endereco_id' => 'int',
		'Regime_iva_id' => 'int',
		'regime_pagamento_id' => 'int',
		'metode_pagamento_id' => 'int',
		'moeda_id' => 'int',
		'gupo_cliente_id' => 'int',
		'blokeado' => 'int'
	];

	protected $fillable = [
		'nome',
		'sigla',
		'nuit',
		'telefone',
		'email',
		'website',
		'foto',
		'endereco_id',
		'Regime_iva_id',
		'regime_pagamento_id',
		'metode_pagamento_id',
		'moeda_id',
		'gupo_cliente_id',
		'blokeado'
	];

	public function regime_iva()
	{
		return $this->belongsTo(RegimeIva::class, 'Regime_iva_id');
	}

	public function endereco()
	{
		return $this->belongsTo(Endereco::class);
	}

	public function gupo_cliente()
	{
		return $this->belongsTo(GupoCliente::class);
	}

	public function metode_pagamento()
	{
		return $this->belongsTo(MetodePagamento::class);
	}

	public function moeda()
	{
		return $this->belongsTo(Moeda::class);
	}

	public function regime_pagamento()
	{
		return $this->belongsTo(RegimePagamento::class);
	}

	public function cotacaos()
	{
		return $this->hasMany(Cotacao::class);
	}

	public function faturas()
	{
		return $this->hasMany(Fatura::class);
	}

	public function vendas()
	{
		return $this->hasMany(Venda::class);
	}
}
