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
 * Class GupoCliente
 * 
 * @property int $id
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Cliente[] $clientes
 *
 * @package App\Models
 */
class GupoCliente extends Model
{
	use SoftDeletes;
	protected $table = 'gupo_cliente';

	protected $fillable = [
		'descricao'
	];

	public function clientes()
	{
		return $this->hasMany(Cliente::class);
	}
}
