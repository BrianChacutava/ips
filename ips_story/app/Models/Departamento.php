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
 * Class Departamento
 * 
 * @property int $id
 * @property string|null $nome
 * @property string|null $descricao
 * @property int $empresa_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Empresa $empresa
 * @property Collection|Funcionario[] $funcionarios
 *
 * @package App\Models
 */
class Departamento extends Model
{
	use SoftDeletes;
	protected $table = 'departamento';

	protected $casts = [
		'empresa_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'descricao',
		'empresa_id'
	];

	public function empresa()
	{
		return $this->belongsTo(Empresa::class);
	}

	public function funcionarios()
	{
		return $this->belongsToMany(Funcionario::class, 'departamento_has_funcionario')
					->withPivot('id', 'descricao', 'deleted_at')
					->withTimestamps();
	}
}
