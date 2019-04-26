<?php
 
namespace App;

use Illuminate\Support\Facades\Auth;
 
trait GenerarAuditoria {

    public $anterior = [];

    public static function bootGenerarAuditoria()
    {
        static::updating(function ($modelo){
            $modelo->anterior = $modelo->getOriginal();
        });

        $eventosAuditables = ['created', 'updated', 'deleted'];
        if (isset(static::$eventosAuditables)){
            $eventosAuditables = static::$eventosAuditables;
        }

        foreach ($eventosAuditables as $evento) {
            static::$evento(function ($modelo) use ($evento) {
                $nombre_modelo = strtolower(class_basename($modelo));
                $modelo->crear_auditoria("{$nombre_modelo}_{$evento}");
            });
        }
    }

    public function crear_auditoria($descripcion)
    {
        $cambios = null;

        if($this->wasChanged()) {
            $cambios = [
                'antes' => array_except(array_diff_assoc($this->anterior, $this->getAttributes()), 'updated_at'),
                'despues' => array_except($this->getChanges(), 'updated_at')
            ];
        }

        $this->auditoria()->create([
            'id_actividad' => class_basename($this) === 'Actividad' ? $this->id : $this->id_actividad,
            'id_usuario' => $this->adivinarUsuario(),
            'descripcion' => $descripcion,
            'cambios' => $cambios
        ]);
    }

    public function adivinarUsuario ()
    {
        if (!Auth::id()) 
            return ($this->actividad)?$this->actividad->creador->id:$this->creador->id;
        return Auth::id();
    }

    public function auditoria ()
    {
        return $this->morphMany('App\Auditoria', 'objeto', 'tipo_objeto', 'id_objeto')->latest();
    }
 
}