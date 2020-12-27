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
 * Class DomicilioAtividade
 * 
 * @property int $id
 * @property string|null $telemovel
 * @property string|null $tel_fixo
 * @property string|null $fax
 * @property string|null $email
 * @property string|null $email_alternativo
 * @property int $endereco_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Endereco $endereco
 * @property Collection|Empresa[] $empresas
 *
 * @package App\Models
 */
class DomicilioAtividade extends Model
{
	use SoftDeletes;
	protected $table = 'domicilio_atividade';

	protected $casts = [
		'endereco_id' => 'int'
	];

	protected $fillable = [
		'telemovel',
		'tel_fixo',
		'fax',
		'email',
		'email_alternativo',
		'endereco_id'
	];

	public function endereco()
	{
		return $this->belongsTo(Endereco::class);
	}

	public function empresas()
	{
		return $this->hasMany(Empresa::class);
	}
}
