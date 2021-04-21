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
 * Class GrupoPreco
 * 
 * @property int $id
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Preco[] $precos
 *
 * @package App\Models
 */
class GrupoPreco extends Model
{
	use SoftDeletes;
	protected $table = 'grupo_preco';

	protected $fillable = [
		'descricao'
	];

	public function precos()
	{
		return $this->hasMany(Preco::class);
	}
}
