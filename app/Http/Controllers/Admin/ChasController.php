<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cha;
use Illuminate\Http\Request;
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
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cha = new Cha();
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
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
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
        $cha->delete();
        return redirect()->back();
    }
}
