<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 * 
 * @property int $id_evento
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $foto
 * @property int|null $id_reserva
 * @property int|null $id_deporte
 * 
 * @property Reserva|null $reserva
 * @property Deporte|null $deporte
 * @property Collection|ParticipanteEvento[] $participante_eventos
 *
 * @package App\Models
 */
class Evento extends Model
{
	protected $table = 'eventos';
	protected $primaryKey = 'id_evento';
	public $timestamps = false;

	protected $casts = [
		'id_reserva' => 'int',
		'id_deporte' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'foto',
		'id_reserva',
		'id_deporte'
	];

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'id_reserva');
	}

	public function deporte()
	{
		return $this->belongsTo(Deporte::class, 'id_deporte');
	}

	public function participante_eventos()
	{
		return $this->hasMany(ParticipanteEvento::class, 'id_evento');
	}
}
