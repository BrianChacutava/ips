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
 * Class Pai
 * 
 * @property int $id
 * @property string $nome
 * @property string|null $lingua
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $moeda_id
 * 
 * @property Moeda|null $moeda
 * @property Collection|Provincium[] $provincia
 *
 * @package App\Models
 */
class Pai extends Model
{
	use SoftDeletes;
	protected $table = 'pais';

	protected $casts = [
		'moeda_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'lingua',
		'moeda_id'
	];

	public function moeda()
	{
		return $this->belongsTo(Moeda::class);
	}

	public function provincia()
	{
		return $this->hasMany(Provincium::class, 'pais_id');
	}
}
