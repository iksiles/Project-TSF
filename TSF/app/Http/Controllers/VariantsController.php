<?php

namespace App\Http\Controllers;

use App\Models\Variants;
use App\Models\Tsf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var = Variants::orderBy('id','asc')->paginate(15);
        $vars = Variants::all();
        if (Variants::exists($vars)) {
            $modelORG = $vars[0]->modelo_ORG;
            $tsf = Tsf::where('modelo','=',$modelORG)->get();
            return view('Tsf.Variants', ['var'=>$var, 'tsf'=>$tsf]);
        } else {
            return view('Tsf.Variants', ['var'=>$var]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tsf = Tsf::AllTsfs();
        return view('Tsf.crearV', compact('tsf'));
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

        $var = new Variants();
        $var->modelo_ORG = $request->modelo_ORG;
        $var->modelo = $request->modelo;
        $var->nacionalidad = $request->nacionalidad;
        $var->anyo = $request->anyo;
        $var->motores = $request->motores;

        if ($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = Str::slug($request->modelo).".".$img->guessExtension();
            $ruta = public_path("img/variants/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $var->img = $nomImg;
            $var->type = $img->guessExtension();
        }
        $var->save();
        return redirect()->action([VariantsController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $var = Variants::findOrFail($id);
        return view('Tsf.verV', ['var' => $var]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $var = Variants::findOrFail($id);
        return view('Tsf.editarV', ['var' => $var]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $var = Variants::findOrFail($id);
        $var->modelo = $request->modelo;
        $var->nacionalidad = $request->nacionalidad;
        $var->anyo = $request->anyo;
        $var->motores = $request->motores;

        if ($request->hasFile("img")){
            unlink(public_path('img/variants/'.$var->img));
            $img = $request->file("img");
            $nomImg = Str::slug($request->modelo).".".$img->guessExtension();
            $ruta = public_path("img/variants/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $var->img = $nomImg;
            $var->type = $img->guessExtension();
        } elseif ($request->modelo == $var->modelo) {
            
            $img = public_path('img/variants/'.$var->img);
            
            $nomImg = Str::slug($request->modelo).".".$var->type;
            $ruta = public_path("img/variants/");

            copy($img,$ruta.$nomImg);
            unlink(public_path('img/variants/'.$var->img));
            $var->img = $nomImg;
        };

        $var->save();
        return redirect()->action([VariantsController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $var = Variants::findOrFail($id);
        unlink(public_path('img/variants/'.$var->img));
        $var->delete();
        return redirect()->route('Tsf.variants')->with('success', 'El TSF ha sido removido de la BDD');
    }

    public function confirm($id) 
    {
        $var = Variants::findOrFail($id);
        return view('Tsf.confirmV', compact('var'));
    }
}
