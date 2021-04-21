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
 * Class User
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $foto
 * @property Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $categoria_usuario_id
 * @property int|null $ativo
 * 
 * @property CategoriaUsuario|null $categoria_usuario
 * @property Collection|Funcionario[] $funcionarios
 * @property Collection|Login[] $logins
 * @property Collection|Logout[] $logouts
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'categoria_usuario_id' => 'int',
		'ativo' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'foto',
		'email_verified_at',
		'remember_token',
		'categoria_usuario_id',
		'ativo'
	];

	public function categoria_usuario()
	{
		return $this->belongsTo(CategoriaUsuario::class);
	}

	public function funcionarios()
	{
		return $this->hasMany(Funcionario::class);
	}

	public function logins()
	{
		return $this->hasMany(Login::class);
	}

	public function logouts()
	{
		return $this->hasMany(Logout::class);
	}
}
