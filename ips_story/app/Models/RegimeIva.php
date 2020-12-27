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
 * Class RegimeIva
 * 
 * @property int $id
 * @property string|null $regime
 * @property float $percentagem
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class RegimeIva extends Model
{
	use SoftDeletes;
	protected $table = 'regime_iva';

	protected $casts = [
		'percentagem' => 'float'
	];

	protected $fillable = [
		'regime',
		'percentagem'
	];

	public function vendas()
	{
		return $this->hasMany(Venda::class, 'Regime_iva_id');
	}
}
