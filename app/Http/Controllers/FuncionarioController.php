<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Departamento;

class FuncionarioController extends Controller
{
    public function index()
    {
        return Funcionario::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:funcionarios',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);
        return Funcionario::create($data);
    }

    public function show($id)
    {
        return Funcionario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $func = Funcionario::findOrFail($id);
        $data = $request->validate([
            'nome' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:funcionarios,email,' . $id,
            'departamento_id' => 'sometimes|required|exists:departamentos,id',
        ]);
        $func->update($data);
        return $func;
    }

    public function destroy($id)
    {
        $func = Funcionario::findOrFail($id);
        $func->delete();
        return response()->json(['mensagem' => 'Funcionário deletado']);
    }

    public function getDepartamento($id)
    {
        $func = Funcionario::with('departamento')->findOrFail($id);
        return $func->departamento;
    }

    public function indexComDepartamento()
    {
        return Funcionario::with('departamento')->get();
    }
}
