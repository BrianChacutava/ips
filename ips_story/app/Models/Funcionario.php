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
 * Class Funcionario
 * 
 * @property int $id
 * @property string|null $cargo
 * @property string|null $formacao
 * @property Carbon|null $data_inicio
 * @property Carbon|null $data_fim
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $user_id
 * 
 * @property User $user
 * @property Collection|Cotacao[] $cotacaos
 * @property Collection|Departamento[] $departamentos
 * @property Collection|Fatura[] $faturas
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class Funcionario extends Model
{
	use SoftDeletes;
	protected $table = 'funcionario';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'data_inicio',
		'data_fim'
	];

	protected $fillable = [
		'cargo',
		'formacao',
		'data_inicio',
		'data_fim',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function cotacaos()
	{
		return $this->hasMany(Cotacao::class);
	}

	public function departamentos()
	{
		return $this->belongsToMany(Departamento::class, 'departamento_has_funcionario')
					->withPivot('id', 'descricao', 'deleted_at')
					->withTimestamps();
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
