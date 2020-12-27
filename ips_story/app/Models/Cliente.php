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
 * Class Cliente
 * 
 * @property int $id
 * @property string|null $nome
 * @property int|null $nuit
 * @property string|null $telefone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $foto
 * @property int|null $endereco_id
 * @property int|null $moeda_id
 * @property int|null $gupo_cliente_id
 * @property int|null $blokeado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Endereco|null $endereco
 * @property GupoCliente|null $gupo_cliente
 * @property Moeda|null $moeda
 * @property Collection|Cotacao[] $cotacaos
 * @property Collection|Fatura[] $faturas
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class Cliente extends Model
{
	use SoftDeletes;
	protected $table = 'cliente';

	protected $casts = [
		'nuit' => 'int',
		'endereco_id' => 'int',
		'moeda_id' => 'int',
		'gupo_cliente_id' => 'int',
		'blokeado' => 'int'
	];

	protected $fillable = [
		'nome',
		'nuit',
		'telefone',
		'email',
		'website',
		'foto',
		'endereco_id',
		'moeda_id',
		'gupo_cliente_id',
		'blokeado'
	];

	public function endereco()
	{
		return $this->belongsTo(Endereco::class);
	}

	public function gupo_cliente()
	{
		return $this->belongsTo(GupoCliente::class);
	}

	public function moeda()
	{
		return $this->belongsTo(Moeda::class);
	}

	public function cotacaos()
	{
		return $this->hasMany(Cotacao::class);
	}

	public function faturas()
	{
		return $this->hasMany(Fatura::class);
	}

	public function vendas()
	{
		return $this->hasMany(Venda::class);
	}
}
