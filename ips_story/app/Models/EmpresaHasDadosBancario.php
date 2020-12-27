<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmpresaHasDadosBancario
 * 
 * @property int $id
 * @property int $empresa_id
 * @property int $dados_bancarios_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property DadosBancario $dados_bancario
 * @property Empresa $empresa
 *
 * @package App\Models
 */
class EmpresaHasDadosBancario extends Model
{
	use SoftDeletes;
	protected $table = 'empresa_has_dados_bancarios';

	protected $casts = [
		'empresa_id' => 'int',
		'dados_bancarios_id' => 'int'
	];

	protected $fillable = [
		'empresa_id',
		'dados_bancarios_id'
	];

	public function dados_bancario()
	{
		return $this->belongsTo(DadosBancario::class, 'dados_bancarios_id');
	}

	public function empresa()
	{
		return $this->belongsTo(Empresa::class);
	}
}
