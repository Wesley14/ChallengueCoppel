<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folio;
use App\Models\Estatus;
use App\Models\Usuario;

use Illuminate\Support\Facades\DB;

class FolioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$folios = Folio::all();
           $folios = DB::table('folios as f')
            ->join('usuarios as ua', 'ua.id', '=', 'f.autor_id')
            ->join('usuarios as ur', 'ur.id', '=', 'f.responsable_id')
            ->join('estatuses as es','es.id','=','f.estatus_id')
            ->select('f.id','f.codigo','f.titulo', 'f.descripcion', 'ua.nombre as autor','ur.nombre as nombre_responsable','f.fecha_esp_resolucion','es.nombre as estatus')
            ->get();

            /*$folios = DB::table('folios')
            ->join('usuarios', 'usuarios.id', '=', 'folios.autor_id')
            ->select('folios.titulo', 'folios.descripcion', 'folios.nombre,','folios.fecha_esp_resolucion','folios.autor','folios.responsable_id')
            ->get();*/

           

        return view('folio.index')->with('folios',$folios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estatus = Estatus::where('nombre', 'Solicitado')->first();
        $usuarios = Usuario::all();
        $cod = mt_rand(0, 9999);
         return view('folio.create',)->with('estatus',$estatus)
                                    ->with('usuarios',$usuarios)
                                    ->with('cod',$cod);
                                    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DB::table('folios')->insert([
            'codigo' => $request->get('codigo'),
            'titulo' => $request->get('titulo') ,
            'descripcion' => $request->get('descripcion'),
            'fecha_esp_resolucion'=>$request->get('fecha_resolucion'),
            'autor_id'=>$request->get('autor'),
            'responsable_id'=>$request->get('responsable'),
            'estatus_id'=>$request->get('estatus')
        ]);

      

        return redirect('/folios');
    }

    public function gen(){
        mt_srand(6);
        // Output: 1656398468
        return mt_rand();
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $folio = Folio::find($id);
        $estatuses = Estatus::all();
        $usuarios = Usuario::all();
        return view('folio.edit')->with('folio', $folio)
                                 ->with('estatuses',$estatuses)
                                 ->with('usuarios',$usuarios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         DB::table('folios')
              ->where('id', $id)
              ->update([
              'titulo' => $request->get('titulo') ,
              'descripcion' => $request->get('descripcion'),
              'fecha_esp_resolucion'=>$request->get('fecha_resolucion'),
              'autor_id'=>$request->get('autor'),
              'responsable_id'=>$request->get('responsable'),
              'estatus_id'=>$request->get('estatus')]);

        return redirect('/folios');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $folio = Folio::find($id);
        
        $folio->delete();

        return redirect('/folios');
    }
}
