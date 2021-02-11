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
 * Class Fornecedor
 * 
 * @property int $id
 * @property int|null $nuit
 * @property string $nome
 * @property string|null $sigla
 * @property string|null $telefone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $foto
 * @property int|null $metode_pagamento_id
 * @property int|null $regime_pagamento_id
 * @property int|null $Regime_iva_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $endereco_id
 * @property int $gupo_fornecedor_id
 * 
 * @property RegimeIva|null $regime_iva
 * @property Endereco $endereco
 * @property GupoFornecedor $gupo_fornecedor
 * @property MetodePagamento|null $metode_pagamento
 * @property RegimePagamento|null $regime_pagamento
 * @property Collection|Desspesa[] $desspesas
 *
 * @package App\Models
 */
class Fornecedor extends Model
{
	use SoftDeletes;
	protected $table = 'fornecedor';

	protected $casts = [
		'nuit' => 'int',
		'metode_pagamento_id' => 'int',
		'regime_pagamento_id' => 'int',
		'Regime_iva_id' => 'int',
		'endereco_id' => 'int',
		'gupo_fornecedor_id' => 'int'
	];

	protected $fillable = [
		'nuit',
		'nome',
		'sigla',
		'telefone',
		'email',
		'website',
		'foto',
		'metode_pagamento_id',
		'regime_pagamento_id',
		'Regime_iva_id',
		'endereco_id',
		'gupo_fornecedor_id'
	];

	public function regime_iva()
	{
		return $this->belongsTo(RegimeIva::class, 'Regime_iva_id');
	}

	public function endereco()
	{
		return $this->belongsTo(Endereco::class);
	}

	public function gupo_fornecedor()
	{
		return $this->belongsTo(GupoFornecedor::class);
	}

	public function metode_pagamento()
	{
		return $this->belongsTo(MetodePagamento::class);
	}

	public function regime_pagamento()
	{
		return $this->belongsTo(RegimePagamento::class);
	}

	public function desspesas()
	{
		return $this->hasMany(Desspesa::class);
	}
}
