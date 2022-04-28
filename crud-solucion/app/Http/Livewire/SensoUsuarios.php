<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Senso;
use DB;
class SensoUsuarios extends Component
{
    public $senso_usuarios,$id_persona, $dni, $nombre, $apellido_paterno, $apellido_materno, $dir, $tfno, $fecnac; 
    public $modal = false, $bloqueo = false, $tipo_usuario;
    public $numero = 0;
    protected $rules = [ //estas reglas se aplican al formulario de creacion de usuarios
        
        'tfno' => 'required|digits:10',
        'fecnac' => 'required|date',
        'dni' => 'required|string',
        'nombre' => 'required|string',
        'apellido_paterno' => 'required|string',
        'apellido_materno' => 'required|string',
        'dir' => 'required|string',

    ];
    public function render() //este metodo se ejecuta cuando se carga la pagina.
    {     
        
        $senso_usuarios = DB::table('senso_usuarios')->paginate(5); //seleccionamos todos los usuarios de la tabla senso_usuarios y los paginamos 
        $this->numero = $senso_usuarios->firstItem();
        $this->tipo_usuario = Auth()->user()->id_tipo_usuario;
       
        return view('livewire.senso-usuarios', ['senso' => $senso_usuarios]); //retornamos la vista senso-usuarios con los usuarios
    }

    public function crear(){ //este metodo se ejecuta cuando se hace click en el boton crear, que es cuando se abre el modal
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
    public function ver($id){ //este metodo se ejecuta cuando se hace click en el boton ver, que es cuando se abre el modal y se visualiza el usuario
        $senso_usuarios = Senso::findOrFail($id);
        $this -> id_persona = $id;
        $this -> dni = $senso_usuarios -> DNI;
        $this -> nombre = $senso_usuarios -> NOMBRE ;
        $this -> apellido_paterno = $senso_usuarios -> APELLIDO_PATERNO;
        $this -> apellido_materno = $senso_usuarios -> APELLIDO_MATERNO;
        $this -> dir = $senso_usuarios -> DIRECCION;
        $this -> tfno = $senso_usuarios -> TELEFONO;
        $this -> fecnac = $senso_usuarios -> FECHA_NACIMIENTO;
        $this -> bloqueo = true; //bloqueamos el formulario para que no se pueda modificar
        $this->validate();
        $this->abrirModal();
    }
    
    public function eliminar($id){ //este metodo se ejecuta cuando se hace click en el boton eliminar, que es cuando se abre el modal y se elimina el usuario
        Senso::find($id)->delete();
        session()->flash('rojo', 'Usuario eliminado correctamentee'); //mensaje de confirmacion
    }

    public function editar($id){ //este metodo se ejecuta cuando se hace click en el boton editar, que es cuando se abre el modal y se edita el usuario
        $senso_usuarios = Senso::findOrFail($id);
        $this -> id_persona = $id;
        $this -> dni = $senso_usuarios -> DNI;
        $this -> nombre = $senso_usuarios -> NOMBRE ;
        $this -> apellido_paterno = $senso_usuarios -> APELLIDO_PATERNO;
        $this -> apellido_materno = $senso_usuarios -> APELLIDO_MATERNO;
        $this -> dir = $senso_usuarios -> DIRECCION;
        $this -> tfno = $senso_usuarios -> TELEFONO;
        $this -> fecnac = $senso_usuarios -> FECHA_NACIMIENTO;
        $this -> bloqueo = false; //desbloqueamos el formulario para que se pueda modificar
        $this->validate();
        $this->abrirModal();
    }
    public function guardar(){ //este metodo se ejecuta cuando se hace click en el boton guardar, que es cuando se guarda el usuario ya sea para modificar o crear
        
        $this->validate(); //validamos los campos del formulario
        
        Senso::updateOrCreate(['id' => $this ->id_persona],
        [ 

            'DNI' => $this -> dni,
            'NOMBRE' => $this -> nombre,
            'APELLIDO_PATERNO' => $this -> apellido_paterno,
            'APELLIDO_MATERNO' => $this -> apellido_materno,
            'DIRECCION' => $this -> dir,
            'TELEFONO' => $this -> tfno,
            'FECHA_NACIMIENTO' => $this -> fecnac,
        ]); //actualizamos o creamos el usuario
        session()->flash('verde', 
        $this -> id_persona ? 'Usuario editado correctamente' : 'Usuario creado correctamente'); //mostramos un mensaje de confirmacion
        $this -> cerrarModal();
        $this -> limpiar(); //limpiamos los campos del formulario
       
    }
}
