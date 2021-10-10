<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caracteristica;
use App\Models\Cha;
use App\Models\ChaCaracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ChasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chas = Cha::all();
        return view('admin.chas.index', compact('chas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' =>  'required',
            'nomeCientifico' => 'required',
            'description' => 'required',
            'cover' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->cover->extension();
        $imagename = time();
        $imagename = $imagename . '.' . $extension;

        $upload = $request->cover->storeAs('public/chas', $imagename);
        $cha = new Cha();
        $data['cover'] = $imagename;
        $cha->fill($data);

        if ($cha->save()) {
            return redirect()->route('admin.chas')->withSuccess('Chá cadastrado com Sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$cha = Cha::find($id)) {
            return redirect()->back();
        }

        return view('admin.chas.show', compact('cha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$cha = Cha::find($id)) {
            return redirect()->back();
        }
        return view('admin.chas.edit', compact('cha'));
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
        if (!$cha = Cha::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' =>  'required',
            'nomeCientifico' =>  'required',
            'description' => 'required',
            'cover' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('cover')) {
            $extension = $request->cover->extension();
            $imagename = time();
            $imagename = $imagename . '.' . $extension;
            $upload = $request->cover->storeAs('public/chas', $imagename);
            if ($upload) {
                $data['cover'] = $imagename;
            } else {
                return redirect()->back()->withErrors('Erro ao fazer o upload!');
            }
        }

        $cha->update($data);

        return redirect()->back()->withSuccess('Chá atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$cha = Cha::find($id)) {
            return redirect()->back();
        }

        if ($cha->cover) {
            $file_path = public_path() . '/storage/chas/' . $cha->cover;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }

        $cha->delete();
        return redirect()->back();
    }

    public function caracteristica($id)
    {
        if (!$cha = Cha::find($id)) {
            return redirect()->back();
        }       
        $chaCaracteristicas = $cha->chaCaracteristica;
       
        $arrcar = $chaCaracteristicas->map(function($model){
            return $model->caracteristica_id;
        })->toArray();

        $caracteristicas = Caracteristica::query()->whereNotIn('id', $arrcar)->get();

        return view('admin.chas.caracteristica', compact('cha', 'caracteristicas', 'chaCaracteristicas'));
    }

    public function addCaracteristica(Request $request, $idCha)
    {
        $idcaracteristica = $request['caracteristicaId'];
        $chaCaracteristica = new ChaCaracteristica();
        $chaCaracteristica['cha_id'] = $idCha;
        $chaCaracteristica['caracteristica_id'] = $idcaracteristica;
        if ($chaCaracteristica->save()) {
            return redirect()->back()->withSuccess('Característica vinculada com sucesso');
        }
    }

    public function deletarCaracteristica($id)
    {
        if (!$chaCaracteristica = ChaCaracteristica::find($id)) {
            return redirect()->back();
        }

        $chaCaracteristica->delete();
        return redirect()->back();
    }
}