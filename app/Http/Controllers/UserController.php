<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::paginate(2);
        return view('modules.users.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->save();
        return to_route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = User::find($id);
        return view('modules.users.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::find($id);
        return view('modules.users.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        //Buscar y actualizar
        $item = User::findOrFail($id);

        $item->name = $request->name;
        $item->save();

        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return to_route('index');
    }

    /**
     * En trash() usas onlyTrashed() porque tu intención es listar exclusivamente lo que está en la papelera.
     * En restore() usas withTrashed() porque necesitas localizar el registro sin que el framework te bloquee el acceso por estar "oculto", asegurando que la operación de limpieza del campo deleted_at se complete sin conflictos.
     */

    //funcion para que devuelve la vista restore
    public function trash()
    {
        $items = User::onlyTrashed()->paginate(2); // onlyTrashed() filtra para mostrar SOLO los borrados
        return view('modules.users.restore', compact('items'));
    }

    // funcion para restablecer valores borradas
    public function restore(string $id)
    {
        $item = User::withTrashed()->findOrFail($id); //withTrashed() incluye todo (registros activos y registros borrados).
        $item->restore();

        return to_route('trash');
    }
}
