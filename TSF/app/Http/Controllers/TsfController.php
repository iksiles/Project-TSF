<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tsf;
use App\Models\Variants;
use App\Models\Weapons;
use Illuminate\Support\Facades\DB;

class TsfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tsf = Tsf::orderBy('id','asc')->paginate(15);
        return view('Tsf.index', compact('tsf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tsf.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|max:40',
            'nacionalidad' => 'required|max:40',
            'anyo' => 'required|integer',
        ]);
        $tsf = new Tsf();
        $tsf->modelo = $request->modelo;
        $tsf->nacionalidad = $request->nacionalidad;
        $tsf->anyo = $request->anyo;
        $tsf->motores = $request->motores;

        if ($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = Str::slug($request->modelo).".".$img->guessExtension();
            $ruta = public_path("img/tsf/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $tsf->img = $nomImg;
            $tsf->type = $img->guessExtension();
        }
        $tsf->save();
        return redirect()->action([TsfController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tsf = Tsf::findOrFail($id);
        $variant = $tsf->modelo;
        $var = Variants::where('modelo_ORG','=',$variant)->get();
        return view('Tsf.ver', ['tsf' => $tsf, 'var' => $var]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tsf = Tsf::findOrFail($id);
        return view('Tsf.editar', ['tsf' => $tsf]);
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
        $tsf = Tsf::findOrFail($id);
        $tsf->modelo = $request->modelo;
        $tsf->nacionalidad = $request->nacionalidad;
        $tsf->anyo = $request->anyo;
        $tsf->motores = $request->motores;

        if ($request->hasFile("img")){
            unlink(public_path('img/tsf/'.$tsf->img));
            $img = $request->file("img");
            $nomImg = Str::slug($request->modelo).".".$img->guessExtension();
            $ruta = public_path("img/tsf/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $tsf->img = $nomImg;
            $tsf->type = $img->guessExtension();
        } elseif ($request->modelo == $tsf->modelo) {
            
            $img = public_path('img/tsf/'.$tsf->img);
            
            $nomImg = Str::slug($request->modelo).".".$tsf->type;
            $ruta = public_path("img/tsf/");

            copy($img,$ruta.$nomImg);
            unlink(public_path('img/tsf/'.$tsf->img));
            $tsf->img = $nomImg;
        };

        $tsf->save();
        return redirect()->action([TsfController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tsf = Tsf::findOrFail($id);
        unlink(public_path('img/tsf/'.$tsf->img));
        $tsf->delete();
        return redirect()->route('Tsf.index')->with('success', 'El TSF ha sido removido de la BDD');
    }

    public function confirm($id) 
    {
        $tsf = Tsf::findOrFail($id);
        return view('Tsf.confirm', compact('tsf'));
    }
}
