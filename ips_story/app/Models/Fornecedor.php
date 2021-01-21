<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fornecedor
 * 
 * @property int $id
 * @property int|null $nuit
 * @property string $nome
 * @property string|null $telefone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $foto
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $endereco_id
 * @property int $gupo_fornecedor_id
 * 
 * @property Endereco $endereco
 * @property GupoFornecedor $gupo_fornecedor
 *
 * @package App\Models
 */
class Fornecedor extends Model
{
	use SoftDeletes;
	protected $table = 'fornecedor';

	protected $casts = [
		'nuit' => 'int',
		'endereco_id' => 'int',
		'gupo_fornecedor_id' => 'int'
	];

	protected $fillable = [
		'nuit',
		'nome',
		'telefone',
		'email',
		'website',
		'foto',
		'endereco_id',
		'gupo_fornecedor_id'
	];

	public function endereco()
	{
		return $this->belongsTo(Endereco::class);
	}

	public function gupo_fornecedor()
	{
		return $this->belongsTo(GupoFornecedor::class);
	}
}
