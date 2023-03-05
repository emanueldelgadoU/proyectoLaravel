<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Cards extends Component
{
    public $imagen;
    public $nombre;
    public $fecha;
    public $descripcion;
    public $ciudad;
    public $direccion;
    public $aforomax;
    public $categoria;
    public $tipo;

    public function __construct($imagen, $nombre, $fecha, $descripcion, $ciudad, $direccion, $aforomax, $categoria, $tipo)
    {
        $this->imagen = $imagen;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->aforomax = $aforomax;
        $this->categoria = $categoria;
        $this->tipo = $tipo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards');
    }
}
