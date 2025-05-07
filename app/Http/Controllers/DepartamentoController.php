<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        return Departamento::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required'
        ]);
        return Departamento::create($data);
    }

    public function show($id)
    {
        return Departamento::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $dep = Departamento::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required'
        ]);
        $dep->update($data);
        return $dep;
    }

    public function destroy($id)
    {
        $dep = Departamento::findOrFail($id);
        $dep->delete();
        return response()->json(['mensagem' => 'Departamento deletado']);
    }

    public function getFuncionarios($id)
    {
        $dep = Departamento::with('funcionarios')->findOrFail($id);
        return $dep->funcionarios;
    }

    public function indexComFuncionarios()
    {
        return Departamento::with('funcionarios')->get();
    }
}
