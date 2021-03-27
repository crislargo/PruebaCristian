<?php

namespace App\Http\Controllers;

use App\Areas;
use App\Empleados;
use App\Roles;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $empleados=Empleados::query()->with('area')->get();
        return view('empleados.index')->with('empleados',$empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = Areas::all();
        $roles = Roles::all();

        return view('empleados.crear')->with('areas', $areas)->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fullname = $request->fullname;
        $email = $request->email;
        $sexo = $request->sexo;
        $area = $request->area;
        $descripcion = $request->descripcion;
        $boletin = $request->boletin;
        $rol = $request->rol;
        if ($rol == null) {
            return response()->json(['error' => true, 'msg' => 'Seleccione un Rol ']);
        }

        if ($boletin == null) {
            $boletin=0;
        }
        //guardar la informacion
        DB::beginTransaction();
        try {
            $crear = new Empleados();
            $crear->nombre = $fullname;
            $crear->email = $email;
            $crear->sexo = $sexo;
            $crear->area_id = $area;
            $crear->boletin = $boletin;
            $crear->descripcion = $descripcion;
            $crear->save();
            //realizo insert en tabla de empleado rol
            foreach ($rol as $item) {

                $insert = DB::table('empleado_rol')->insert(['rol_id' => $item, 'empleado_id' => $crear->id]);
            }
        } catch (QueryException $queryException) {
            DB::rollback();

            return response()->json(['msg' => $queryException->getMessage(), 'error' => true]);
        }
        DB::commit();

        return response()->json(['msg' => 'La información ha sido guardada correctamente', 'error' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $areas = Areas::all();
        $roles = Roles::all();

        $empleado=Empleados::find($id);
        return view('empleados.editar')->with('areas', $areas)->with('roles', $roles)->with('empleado',$empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fullname = $request->fullname;
        $email = $request->email;
        $sexo = $request->sexo;
        $area = $request->area;
        $descripcion = $request->descripcion;
        $boletin = $request->boletin;
        $rol = $request->rol;
        if ($rol == null) {
            return response()->json(['error' => true, 'msg' => 'Seleccione un Rol ']);
        }

        if ($boletin == null) {
            $boletin=0;
        }
        //guardar la informacion
        DB::beginTransaction();
        try {
            $crear =Empleados::query()->where('id',$id)->update([
                'nombre' => $fullname,
           'email' => $email,
           'sexo' => $sexo,
           'area_id' => $area,
            'boletin' =>$boletin,
           'descripcion' =>$descripcion
            ]);
            DB::table('empleado_rol')->where('empleado_id',$id)->delete();
            //realizo insert en tabla de empleado rol
            foreach ($rol as $item) {

                $insert = DB::table('empleado_rol')->insert(['rol_id' => $item, 'empleado_id' => $id]);
            }
        } catch (QueryException $queryException) {
            DB::rollback();

            return response()->json(['msg' => $queryException->getMessage(), 'error' => true]);
        }
        DB::commit();

        return response()->json(['msg' => 'La información ha sido Actulizada correctamente', 'error' => false]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
        $crear =Empleados::query()->where('id',$id)->delete();
        DB::table('empleado_rol')->where('empleado_id',$id)->delete();
        } catch (QueryException $queryException) {
            return response()->json(['error' => true, 'msg' => 'Lo sentimos, ha sucedido un error al elimnar al empleado']);
        }
        return response()->json(['success' => true, 'error' => false, 'msg' => 'El Empleado seleccionado fue eliminado']);
    }
}
