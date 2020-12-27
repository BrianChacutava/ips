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
 * Class Preco
 * 
 * @property int $id
 * @property float|null $preco
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Artigo[] $artigos
 *
 * @package App\Models
 */
class Preco extends Model
{
	use SoftDeletes;
	protected $table = 'preco';

	protected $casts = [
		'preco' => 'float'
	];

	protected $fillable = [
		'preco'
	];

	public function artigos()
	{
		return $this->belongsToMany(Artigo::class, 'artigo_has_preco')
					->withPivot('id', 'unidade_base', 'grupo_preco_id', 'deleted_at')
					->withTimestamps();
	}
}
