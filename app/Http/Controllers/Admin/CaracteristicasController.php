<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristicas = Caracteristica::all();
        return view('admin.caracteristicas.index', compact('caracteristicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.caracteristicas.create');
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
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $caracteristica = new Caracteristica();
        $caracteristica->fill($data);

        if ($caracteristica->save()) {
            return redirect()->route('admin.caracteristicas')->withSuccess('Característica cadastrada com Sucesso!');
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
        if (!$caracteristica = Caracteristica::find($id)) {
            return redirect()->back();
        }

        return view('admin.caracteristicas.show', compact('caracteristica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$caracteristica = Caracteristica::find($id)) {
            return redirect()->back();
        }
        return view('admin.caracteristicas.edit', compact('caracteristica'));
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
        if (!$caracteristica = Caracteristica::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' =>  'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $caracteristica->update($data);

        return redirect()->back()->withSuccess('Característica atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$caracteristica = Caracteristica::find($id)) {
            return redirect()->back();
        }
        $caracteristica->delete();
        return redirect()->back();
    }
}
