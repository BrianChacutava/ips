<?php

namespace App;

use App\Models\Funcionario;
use App\Models\CategoriaUsuario;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

	// use SoftDeletes;
	protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
		'name',
		'email',
		'password',
		'foto',
		'email_verified_at',
		'remember_token',
		'categoria_usuario_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
	public function categoria_usuario()
	{
		return $this->belongsTo(CategoriaUsuario::class);
	}

	public function funcionario()
	{
		return $this->hasOne(Funcionario::class, 'user_id');
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
