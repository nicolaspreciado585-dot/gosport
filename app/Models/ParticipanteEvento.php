<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParticipanteEvento
 * 
 * @property int $id_par_evento
 * @property int|null $id_evento
 * @property int|null $id_usuario
 * 
 * @property Evento|null $evento
 * @property Usuario|null $usuario
 *
 * @package App\Models
 */
class ParticipanteEvento extends Model
{
	protected $table = 'participante_evento';
	protected $primaryKey = 'id_par_evento';
	public $timestamps = false;

	protected $casts = [
		'id_evento' => 'int',
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_evento',
		'id_usuario'
	];

	public function evento()
	{
		return $this->belongsTo(Evento::class, 'id_evento');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
