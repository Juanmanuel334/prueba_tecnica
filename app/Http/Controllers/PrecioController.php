<?php

namespace App\Http\Controllers;
use App\Services\PriceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PrecioRequest;
use App\Models\Precio;
use App\Models\Trayecto;

class PrecioController extends Controller
{

public function index()
    {
        $precios = Precio::all();
        return view('precios.index', compact('precios'));
    }
    public function create()
    {
        return view('precios.create');
    }
    public function store(PrecioRequest $request)
    {

        $formData = Precio::create([
            'precio'=>$request->precio,
        ]);

        return redirect()
            ->route('precios.index')
            ->with('success', 'Datos guardados correctamente');
    }

    public function edit($id_trayecto)
    {
        $trayecto = Precio::findOrFail($id_trayecto);
        return view('trayectos.edit', compact('trayecto'));
    }

    // Actualizar la empresa en la base de datos
    public function update(Request $request, $id_trayecto)
    {
        $request->validate([
            'precio'=>'required|string|max:255',
        ]);

        $trayecto = Precio::findOrFail($id_trayecto);
        $trayecto->update($request->all());

        return redirect()->route('precios.index')->with('success', 'Trayecto actualizado correctamente');
    }

        public function show($precio)
{
    $trayecto = Precio::findOrFail($precio);
    return view('precios.show', compact('precio'));
}
public function destroy($precio)
    {
        $trayecto = Precio::findOrFail($precio);
        $trayecto->delete();

        return redirect()->route('precios.index')->with('success', 'Trayecto eliminado correctamente.');
    }
}

