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
 * Class Caixa
 * 
 * @property int $id
 * @property string|null $descricao
 * @property string|null $iban
 * @property string|null $swift
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $dados_bancarios_id
 * 
 * @property DadosBancario|null $dados_bancario
 * @property Collection|Desspesa[] $desspesas
 *
 * @package App\Models
 */
class Caixa extends Model
{
	use SoftDeletes;
	protected $table = 'caixa';

	protected $casts = [
		'dados_bancarios_id' => 'int'
	];

	protected $fillable = [
		'descricao',
		'iban',
		'swift',
		'dados_bancarios_id'
	];

	public function dados_bancario()
	{
		return $this->belongsTo(DadosBancario::class, 'dados_bancarios_id');
	}

	public function desspesas()
	{
		return $this->hasMany(Desspesa::class);
	}
}
