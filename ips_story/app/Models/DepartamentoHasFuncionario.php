<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DepartamentoHasFuncionario
 * 
 * @property int $id
 * @property int $departamento_id
 * @property int $funcionario_id
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Departamento $departamento
 * @property Funcionario $funcionario
 *
 * @package App\Models
 */
class DepartamentoHasFuncionario extends Model
{
	use SoftDeletes;
	protected $table = 'departamento_has_funcionario';

	protected $casts = [
		'departamento_id' => 'int',
		'funcionario_id' => 'int'
	];

	protected $fillable = [
		'departamento_id',
		'funcionario_id',
		'descricao'
	];

	public function departamento()
	{
		return $this->belongsTo(Departamento::class);
	}

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class);
	}
}
