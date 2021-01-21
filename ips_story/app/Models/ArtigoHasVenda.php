<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ArtigoHasVenda
 * 
 * @property int $id
 * @property int $artigo_id
 * @property int $venda_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Artigo $artigo
 * @property Venda $venda
 *
 * @package App\Models
 */
class ArtigoHasVenda extends Model
{
	use SoftDeletes;
	protected $table = 'artigo_has_venda';

	protected $casts = [
		'artigo_id' => 'int',
		'venda_id' => 'int'
	];

	protected $fillable = [
		'artigo_id',
		'venda_id'
	];

	public function artigo()
	{
		return $this->belongsTo(Artigo::class);
	}

	public function venda()
	{
		return $this->belongsTo(Venda::class);
	}
}
