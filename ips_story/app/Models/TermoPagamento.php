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
 * Class TermoPagamento
 * 
 * @property int $id
 * @property string|null $termo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Cotacao[] $cotacaos
 *
 * @package App\Models
 */
class TermoPagamento extends Model
{
	use SoftDeletes;
	protected $table = 'termo_pagamento';

	protected $fillable = [
		'termo'
	];

	public function cotacaos()
	{
		return $this->hasMany(Cotacao::class);
	}
}
