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
 * Class CategoriaUsuario
 * 
 * @property int $id
 * @property string|null $tipo
 * @property int|null $prioridade
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class CategoriaUsuario extends Model
{
	use SoftDeletes;
	protected $table = 'categoria_usuario';

	protected $casts = [
		'prioridade' => 'int'
	];

	protected $fillable = [
		'tipo',
		'prioridade'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
