<?php

namespace App\Http\Controllers;
use App\Models\Trayecto;
use Illuminate\Http\Request;
use App\Http\Requests\TrayectoRequest;
use Carbon\Carbon;

class TrayectoController extends Controller
{
    public function index(Request $request)
    {

        $trayectos = Trayecto::all();

        return view('trayectos.index', compact('trayectos'));
    }
    public function ind(Request $request)
    {

        $origenes = Trayecto::select('origen')->distinct()->pluck('origen');
        $destinos = Trayecto::select('destino')->distinct()->pluck('destino');

        // Obtener fechas disponibles y formatearlas como YYYY-MM-DD para el calendario
        $fechasDisponibles = Trayecto::select('fecha')->distinct()->pluck('fecha')->map(function ($fecha) {
            return Carbon::parse($fecha)->format('Y-m-d');
        });

        $origen = $request->input('origen');
        $destino = $request->input('destino');
        $fecha = $request->input('fecha');
        $orden = $request->input('orden');

        $trayectos = Trayecto::when($origen, fn($query) => $query->where('origen', $origen))
                          ->when($destino, fn($query) => $query->where('destino', $destino))
                          ->when($fecha, fn($query) => $query->whereDate('fecha', $fecha));

        if ($orden === 'rapido') {
            $trayectos->orderBy('tiempo_aprox', 'asc');
        } elseif ($orden === 'barato') {
            $trayectos->orderBy('precio', 'asc');
        }

        $trayectos = $trayectos->get();

        return view('welcome', compact('trayectos', 'origenes', 'destinos', 'fechasDisponibles'));
    }


    public function create()
    {
        return view('trayectos.create');
    }
    public function store(TrayectoRequest $request)
    {

        $formData = Trayecto::create([
            'origen'=>$request->origen,
            'destino'=>$request->destino,
            'kms'=>$request->kms,
            'tiempo_aprox'=>$request->tiempo_aprox,
            'hora_salida'=>$request->hora_salida,
            'hora_llegada'=>$request->hora_llegada,
            'fecha'=>$request->fecha,
            'precio'=>$request->precio,
        ]);

        return redirect()
            ->route('trayectos.index')
            ->with('success', 'Datos guardados correctamente');
    }

    public function edit($id_trayecto)
    {
        $trayecto = Trayecto::findOrFail($id_trayecto);
        return view('trayectos.edit', compact('trayecto'));
    }

    // Actualizar la empresa en la base de datos
    public function update(Request $request, $id_trayecto)
    {
        $request->validate([
            'origen' => 'required|string|max:255',
            'destino'=> 'required|string|max:255',
            'kms'=> 'required|int|max:10',
            'tiempo_aprox'=> 'required|string|max:255',
            'fecha'=> 'required|date',
            'precio'=> 'required|string|max:255',
        ]);

        $trayecto = Trayecto::findOrFail($id_trayecto);
        $trayecto->update($request->all());

        return redirect()->route('trayectos.index')->with('success', 'Trayecto actualizado correctamente');
    }

        public function show($id_trayecto)
{
    $trayecto = Trayecto::findOrFail($id_trayecto);
    return view('trayectos.show', compact('trayecto'));
}
public function destroy($id_trayecto)
    {
        $trayecto = Trayecto::findOrFail($id_trayecto);
        $trayecto->delete();

        return redirect()->route('trayectos.index')->with('success', 'Trayecto eliminado correctamente.');
    }
}
