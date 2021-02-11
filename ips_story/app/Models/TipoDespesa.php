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
 * Class TipoDespesa
 * 
 * @property int $id
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Desspesa[] $desspesas
 *
 * @package App\Models
 */
class TipoDespesa extends Model
{
	use SoftDeletes;
	protected $table = 'tipo_despesa';

	protected $fillable = [
		'descricao'
	];

	public function desspesas()
	{
		return $this->hasMany(Desspesa::class);
	}
}
