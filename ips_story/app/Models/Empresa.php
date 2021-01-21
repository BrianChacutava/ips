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
 * Class Empresa
 * 
 * @property int $id
 * @property string|null $nome_proprietario
 * @property string|null $nome_comercial
 * @property string|null $nuit
 * @property int $tipo_estabelecimento_id
 * @property int $domicilio_atividade_id
 * @property string|null $atividade_principal
 * @property string|null $outras_atividades
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property DomicilioAtividade $domicilio_atividade
 * @property TipoEstabelecimento $tipo_estabelecimento
 * @property Collection|Armazem[] $armazems
 * @property Collection|Cotacao[] $cotacaos
 * @property Collection|Departamento[] $departamentos
 * @property Collection|DadosBancario[] $dados_bancarios
 * @property Collection|Fatura[] $faturas
 *
 * @package App\Models
 */
class Empresa extends Model
{
	use SoftDeletes;
	protected $table = 'empresa';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'tipo_estabelecimento_id' => 'int',
		'domicilio_atividade_id' => 'int'
	];

	protected $fillable = [
		'nome_proprietario',
		'nome_comercial',
		'nuit',
		'tipo_estabelecimento_id',
		'domicilio_atividade_id',
		'atividade_principal',
		'outras_atividades'
	];

	public function domicilio_atividade()
	{
		return $this->belongsTo(DomicilioAtividade::class);
	}

	public function tipo_estabelecimento()
	{
		return $this->belongsTo(TipoEstabelecimento::class);
	}

	public function armazems()
	{
		return $this->hasMany(Armazem::class);
	}

	public function cotacaos()
	{
		return $this->hasMany(Cotacao::class);
	}

	public function departamentos()
	{
		return $this->hasMany(Departamento::class);
	}

	public function dados_bancarios()
	{
		return $this->belongsToMany(DadosBancario::class, 'empresa_has_dados_bancarios', 'empresa_id', 'dados_bancarios_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function faturas()
	{
		return $this->hasMany(Fatura::class);
	}
}
