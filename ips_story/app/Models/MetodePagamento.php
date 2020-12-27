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
 * Class MetodePagamento
 * 
 * @property int $id
 * @property string|null $metodo
 * @property string|null $descricao
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class MetodePagamento extends Model
{
	use SoftDeletes;
	protected $table = 'metode_pagamento';

	protected $fillable = [
		'metodo',
		'descricao'
	];

	public function vendas()
	{
		return $this->hasMany(Venda::class);
	}
}
