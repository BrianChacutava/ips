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
 * Class Endereco
 * 
 * @property int $id
 * @property int|null $cod_postal
 * @property int $provincia_id
 * @property string|null $rua
 * @property string|null $av
 * @property string|null $num_porta
 * @property string|null $andar
 * @property string|null $flat
 * @property string|null $caixa_postal
 * @property string|null $bairo
 * @property int|null $blockeado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Provincium $provincium
 * @property Collection|Cliente[] $clientes
 * @property Collection|DomicilioAtividade[] $domicilio_atividades
 * @property Collection|Fornecedor[] $fornecedors
 *
 * @package App\Models
 */
class Endereco extends Model
{
	use SoftDeletes;
	protected $table = 'endereco';

	protected $casts = [
		'cod_postal' => 'int',
		'provincia_id' => 'int',
		'blockeado' => 'int'
	];

	protected $fillable = [
		'cod_postal',
		'provincia_id',
		'rua',
		'av',
		'num_porta',
		'andar',
		'flat',
		'caixa_postal',
		'bairo',
		'blockeado'
	];

	public function provincium()
	{
		return $this->belongsTo(Provincium::class, 'provincia_id');
	}

	public function clientes()
	{
		return $this->hasMany(Cliente::class);
	}

	public function domicilio_atividades()
	{
		return $this->hasMany(DomicilioAtividade::class);
	}

	public function fornecedors()
	{
		return $this->hasMany(Fornecedor::class);
	}
}
