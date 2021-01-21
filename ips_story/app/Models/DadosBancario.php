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
 * Class DadosBancario
 * 
 * @property int $id
 * @property string|null $nome_banco
 * @property int|null $numero_conta
 * @property string|null $nib
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $moeda_id
 * 
 * @property Moeda|null $moeda
 * @property Collection|Empresa[] $empresas
 *
 * @package App\Models
 */
class DadosBancario extends Model
{
	use SoftDeletes;
	protected $table = 'dados_bancarios';

	protected $casts = [
		'numero_conta' => 'int',
		'moeda_id' => 'int'
	];

	protected $fillable = [
		'nome_banco',
		'numero_conta',
		'nib',
		'moeda_id'
	];

	public function moeda()
	{
		return $this->belongsTo(Moeda::class);
	}

	public function empresas()
	{
		return $this->belongsToMany(Empresa::class, 'empresa_has_dados_bancarios', 'dados_bancarios_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
