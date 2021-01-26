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
 * Class RegimePagamento
 * 
 * @property int $id
 * @property int|null $dias
 * @property float|null $taxa
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Cliente[] $clientes
 * @property Collection|Cotacao[] $cotacaos
 * @property Collection|Fatura[] $faturas
 * @property Collection|Fornecedor[] $fornecedors
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class RegimePagamento extends Model
{
	use SoftDeletes;
	protected $table = 'regime_pagamento';

	protected $casts = [
		'dias' => 'int',
		'taxa' => 'float'
	];

	protected $fillable = [
		'dias',
		'taxa',
		'descricao'
	];

	public function clientes()
	{
		return $this->hasMany(Cliente::class);
	}

	public function cotacaos()
	{
		return $this->hasMany(Cotacao::class);
	}

	public function faturas()
	{
		return $this->hasMany(Fatura::class);
	}

	public function fornecedors()
	{
		return $this->hasMany(Fornecedor::class);
	}

	public function vendas()
	{
		return $this->hasMany(Venda::class);
	}
}
