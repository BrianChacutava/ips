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
 * Class TipoArtigo
 * 
 * @property int $id
 * @property string|null $tipo
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Artigo[] $artigos
 *
 * @package App\Models
 */
class TipoArtigo extends Model
{
	use SoftDeletes;
	protected $table = 'tipo_artigo';

	protected $fillable = [
		'tipo',
		'descricao'
	];

	public function artigos()
	{
		return $this->hasMany(Artigo::class);
	}
}
