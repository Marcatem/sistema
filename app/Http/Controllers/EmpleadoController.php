<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados'] = Empleado::paginate(1);
        return view('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // primero necesitamos los campos a validar 
        $campos = [
            'Nombre' => 'required|String|max:100',
            'ApellidoPaterno' => 'required|String|max:100',
            'ApellidoMaterno' => 'required|String|max:100',
            'Correo' => 'required|email',
            'Foto' => 'required|max:100|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Foto' => 'la foto es requerida'
        ];
        // vamos a unir , todo lo que se esta enviando valide los campos y muestre los mensajes
        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado=request()->all();  // va a obtener toda la informacion c
        $datosEmpleado = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Empleado::insert($datosEmpleado);
        // return response()->json($datosEmpleado); // despues va a responder en un formato json
        return redirect('empleados')->with('mensaje', 'empleado agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $empleado = Empleado::findOrFail($id); // buscamos el id en el controlador y lo guardamos en empleados
        return view('empleados.edit', compact('empleado')); // con compact le cargamos la informacion


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // primero necesitamos los campos a validar 
        $campos = [
            'Nombre' => 'required|String|max:100',
            'ApellidoPaterno' => 'required|String|max:100',
            'ApellidoMaterno' => 'required|String|max:100',
            'Correo' => 'required|email',

        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        if ($request->hasFile('Foto')) {
            $campos = [
                'Foto' => 'required|max:100|mimes:jpeg,png,jpg'
            ];
            $mensaje = [
                'Foto' => 'la foto es requerida'
            ];
        }



        // vamos a unir , todo lo que se esta enviando valide los campos y muestre los mensajes
        $this->validate($request, $campos, $mensaje);
        // recepcionamos los datos y le quitamos el method y el token
        $datosEmpleado = request()->except(['_token', '_method']);
        // si esa fotografia existe  y
        if ($request->hasFile('Foto')) {
            // vamos a recuperar la informacion
            $empleado = Empleado::findOrFail($id);
            // despues de recuperar realizamos el borrado    
            Storage::delete(['public/' . $empleado->Foto]);


            //si existe esa foto lo vas a adjuntar y pasarle el nombre
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }



        // comparamos los datos  y si son iguales actualizamos
        Empleado::where('id', '=', $id)->update($datosEmpleado);

        $empleado = Empleado::findOrFail($id);
        //return view('empleados.edit', compact('empleado'));
        return redirect('empleados')->with('mensaje', 'empleado modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        // intentamos borrar desde la url foto 
        if (Storage::delete('public/' . $empleado->Foto)) {
            Empleado::destroy($id);
        }

        return redirect('empleados')->with('mensaje', 'empleado borrado');
    }
}
