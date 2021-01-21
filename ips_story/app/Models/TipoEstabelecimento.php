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
 * Class TipoEstabelecimento
 * 
 * @property int $id
 * @property string|null $tipo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Empresa[] $empresas
 *
 * @package App\Models
 */
class TipoEstabelecimento extends Model
{
	use SoftDeletes;
	protected $table = 'tipo_estabelecimento';

	protected $fillable = [
		'tipo'
	];

	public function empresas()
	{
		return $this->hasMany(Empresa::class);
	}
}
