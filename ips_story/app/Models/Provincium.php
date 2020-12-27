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
 * Class Provincium
 * 
 * @property int $id
 * @property string|null $nome
 * @property string|null $capital
 * @property int $pais_id
 * @property string|null $provinciacol
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Pai $pai
 * @property Collection|Endereco[] $enderecos
 *
 * @package App\Models
 */
class Provincium extends Model
{
	use SoftDeletes;
	protected $table = 'provincia';

	protected $casts = [
		'pais_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'capital',
		'pais_id',
		'provinciacol'
	];

	public function pai()
	{
		return $this->belongsTo(Pai::class, 'pais_id');
	}

	public function enderecos()
	{
		return $this->hasMany(Endereco::class, 'provincia_id');
	}
}
