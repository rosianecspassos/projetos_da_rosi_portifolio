<?php

namespace App\Http\Controllers;

use App\Models\Sobre;
use Illuminate\Http\Request;

class SobreController extends Controller
{
    public function index()
    {
        $sobres = Sobre::all(); // Arrays já são convertidos automaticamente pelo Eloquent
        return view('sobre.index', compact('sobres'));
    }

    public function create()
    {
        return view('cadastros.sobre');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desc_sobre' => 'required|string',
            'competencia.*' => 'nullable|string|max:255',
            'curso.*' => 'nullable|string|max:255',
            'link_curso.*' => 'nullable|url|max:255',
            'desc_curso.*' => 'nullable|string|max:255',
        ]);

        Sobre::create([
            'desc_sobre' => $request->input('desc_sobre'),
            'competencia' => $request->input('competencia', []),
            'curso' => $request->input('curso', []),
            'link_curso' => $request->input('link_curso', []),
            'desc_curso' => $request->input('desc_curso', []),
        ]);

        return redirect()->route('sobre.index')->with('success', 'Salvo com sucesso!');
    }

    public function editar()
    {
        $sobres = Sobre::all(); // Arrays já tratados automaticamente
        return view('sobre.editar', compact('sobres'));
    }

    public function edit($id)
    {
        $sobre = Sobre::findOrFail($id); // Arrays já tratados automaticamente
        return view('editar.sobre', compact('sobre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desc_sobre' => 'required|string',
            'competencia.*' => 'nullable|string|max:255',
            'curso.*' => 'nullable|string|max:255',
            'link_curso.*' => 'nullable|url|max:255',
            'desc_curso.*' => 'nullable|string|max:255',
        ]);

        $sobre = Sobre::findOrFail($id);

        $sobre->update([
            'desc_sobre' => $request->input('desc_sobre'),
            'competencia' => $request->input('competencia', []),
            'curso' => $request->input('curso', []),
            'link_curso' => $request->input('link_curso', []),
            'desc_curso' => $request->input('desc_curso', []),
        ]);

        return redirect()->route('sobre.index')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $sobre = Sobre::findOrFail($id);
        $sobre->delete();
        return redirect()->route('sobre.index')->with('success', 'Excluído com sucesso!');
    }
}
