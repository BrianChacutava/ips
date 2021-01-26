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
 * @property string|null $numero_conta
 * @property string|null $nib
 * @property int|null $moeda_id
 * @property int|null $nuit
 * @property string|null $telefone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $foto
 * @property int|null $endereco_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Endereco|null $endereco
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
		'moeda_id' => 'int',
		'nuit' => 'int',
		'endereco_id' => 'int'
	];

	protected $fillable = [
		'nome_banco',
		'numero_conta',
		'nib',
		'moeda_id',
		'nuit',
		'telefone',
		'email',
		'website',
		'foto',
		'endereco_id'
	];

	public function endereco()
	{
		return $this->belongsTo(Endereco::class);
	}

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
