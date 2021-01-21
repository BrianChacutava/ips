<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContaDeRendimento
 * 
 * @property int $id
 * @property string|null $conta
 * @property string|null $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class ContaDeRendimento extends Model
{
	use SoftDeletes;
	protected $table = 'conta de rendimento';

	protected $fillable = [
		'conta',
		'descricao'
	];
}
