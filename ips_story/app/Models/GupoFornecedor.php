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
 * Class GupoFornecedor
 * 
 * @property int $id
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Fornecedor[] $fornecedors
 *
 * @package App\Models
 */
class GupoFornecedor extends Model
{
	use SoftDeletes;
	protected $table = 'gupo_fornecedor';

	protected $fillable = [
		'descricao'
	];

	public function fornecedors()
	{
		return $this->hasMany(Fornecedor::class);
	}
}
