<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Senso;

class SensoUsuarios extends Component
{
    public $senso_usuarios,$id_persona, $dni, $nombre, $apellido_paterno, $apellido_materno, $dir, $tfno, $fecnac;
    public $modal = false, $bloqueo = false;
    protected $rules = [
        
        'tfno' => 'required|digits:10',
        'fecnac' => 'required|date',
        'dni' => 'required|string',
        'nombre' => 'required|string',
        'apellido_paterno' => 'required|string',
        'apellido_materno' => 'required|string',
        'dir' => 'required|string',

    ];
    public function render()
    {
        $this->senso_usuarios = Senso::all();
        //dd() para debugear las eloquent queries uwu
        return view('livewire.senso-usuarios');
    }

    public function crear(){ //aqui creamos los usuarios 
        $this->limpiar();
        $this -> bloqueo = false;
        $this->abrirModal();

        
    }

    public function abrirModal(){
        
        $this->modal = true;
    }
    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiar(){
        $this -> dni = "";
        $this -> id_persona = "";
        $this -> nombre = "";
        $this -> apellido_paterno = "";
        $this -> apellido_materno = "";
        $this -> dir = "";
        $this -> tfno = "";
        $this -> fecnac = "";
        

    }
    public function ver($id){
        $senso_usuarios = Senso::findOrFail($id);
        $this -> id_persona = $id;
        $this -> dni = $senso_usuarios -> DNI;
        $this -> nombre = $senso_usuarios -> NOMBRE ;
        $this -> apellido_paterno = $senso_usuarios -> APELLIDO_PATERNO;
        $this -> apellido_materno = $senso_usuarios -> APELLIDO_MATERNO;
        $this -> dir = $senso_usuarios -> DIRECCION;
        $this -> tfno = $senso_usuarios -> TELEFONO;
        $this -> fecnac = $senso_usuarios -> FECHA_NACIMIENTO;
        $this -> bloqueo = true;
        $this->validate();
        $this->abrirModal();
    }
    
    public function eliminar($id){
        Senso::find($id)->delete();
        session()->flash('rojo', 'Usuario eliminado correctamentee');
    }

    public function editar($id){
        $senso_usuarios = Senso::findOrFail($id);
        $this -> id_persona = $id;
        $this -> dni = $senso_usuarios -> DNI;
        $this -> nombre = $senso_usuarios -> NOMBRE ;
        $this -> apellido_paterno = $senso_usuarios -> APELLIDO_PATERNO;
        $this -> apellido_materno = $senso_usuarios -> APELLIDO_MATERNO;
        $this -> dir = $senso_usuarios -> DIRECCION;
        $this -> tfno = $senso_usuarios -> TELEFONO;
        $this -> fecnac = $senso_usuarios -> FECHA_NACIMIENTO;
        $this -> bloqueo = false;
        $this->validate();
        $this->abrirModal();
    }
    public function guardar(){
        
        $this->validate();
        
        Senso::updateOrCreate(['id' => $this ->id_persona],
        [ 

            'DNI' => $this -> dni,
            'NOMBRE' => $this -> nombre,
            'APELLIDO_PATERNO' => $this -> apellido_paterno,
            'APELLIDO_MATERNO' => $this -> apellido_materno,
            'DIRECCION' => $this -> dir,
            'TELEFONO' => $this -> tfno,
            'FECHA_NACIMIENTO' => $this -> fecnac,
        ]);
        session()->flash('verde', 
        $this -> id_persona ? 'Usuario editado correctamente' : 'Usuario creado correctamente');
        $this -> cerrarModal();
        $this -> limpiar();
       
    }
}
