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
 * Class ContaRendimento
 * 
 * @property int $id
 * @property string|null $conta
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Artigo[] $artigos
 *
 * @package App\Models
 */
class ContaRendimento extends Model
{
	use SoftDeletes;
	protected $table = 'conta_rendimento';

	protected $fillable = [
		'conta',
		'descricao'
	];

	public function artigos()
	{
		return $this->hasMany(Artigo::class);
	}
}
