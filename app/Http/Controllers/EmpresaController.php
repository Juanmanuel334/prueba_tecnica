<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::latest()->paginate(10);
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(EmpresaRequest $request)
    {
        $formData = Empresa::create([
            'nombre_empresa' => $request->nombre_empresa,
            'descripcion_empresa' => $request->descripcion_empresa
        ]);

        return redirect()
            ->route('empresas.index')
            ->with('success', 'Datos guardados correctamente');
    }
public function edit($id_empresa)
    {
        $empresa = Empresa::findOrFail($id_empresa);
        return view('empresas.edit', compact('empresa'));
    }

    // Actualizar la empresa en la base de datos
    public function update(Request $request, $id_empresa)
    {
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'descripcion_empresa' => 'required|string|max:255'.$id_empresa,
        ]);

        $empresa = Empresa::findOrFail($id_empresa);
        $empresa->update($request->all());

        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada correctamente');
    }

    public function show($id_empresa)
{
    $empresa = Empresa::findOrFail($id_empresa);
    return view('empresas.show', compact('empresa'));
}
public function destroy($id_empresa)
    {
        $empresa = Empresa::findOrFail($id_empresa);
        $empresa->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada correctamente.');
    }
}



