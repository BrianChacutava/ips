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
 * Class Moeda
 * 
 * @property int $id
 * @property string|null $nome
 * @property string|null $sigla
 * @property float|null $cambio_atual
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Cliente[] $clientes
 * @property Collection|DadosBancario[] $dados_bancarios
 * @property Collection|Fatura[] $faturas
 * @property Collection|Pai[] $pais
 *
 * @package App\Models
 */
class Moeda extends Model
{
	use SoftDeletes;
	protected $table = 'moeda';

	protected $casts = [
		'cambio_atual' => 'float'
	];

	protected $fillable = [
		'nome',
		'sigla',
		'cambio_atual'
	];

	public function clientes()
	{
		return $this->hasMany(Cliente::class);
	}

	public function dados_bancarios()
	{
		return $this->hasMany(DadosBancario::class);
	}

	public function faturas()
	{
		return $this->hasMany(Fatura::class);
	}

	public function pais()
	{
		return $this->hasMany(Pai::class);
	}
}
