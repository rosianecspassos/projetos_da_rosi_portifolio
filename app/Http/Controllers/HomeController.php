<?php

namespace App\Http\Controllers;

use App\Models\Principal;
use App\Models\Projeto;
use App\Models\Sobre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $principais = Principal::all();
        $projetos = Projeto::take(3)->get();
        $sobres = Sobre::take(6)->get(); 
        return view('home.index', ['principais' => $principais, 'projetos' => $projetos, 'sobres' => $sobres]);
    }

    public function create()
    {
        return view('cadastros.home');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        // Salvar a foto se ela foi enviada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/images');
            $data['foto'] = str_replace('public/images/', '', $path); // Salva o caminho relativo para storage
        }

        // Codifica os arrays para JSON antes de salvar
        foreach (['idioma', 'areas', 'formacao', 'experiencia', 'instituicao', 'grau'] as $campo) {
            if ($request->has($campo) && is_array($request->input($campo))) {
                $data[$campo] = json_encode($request->input($campo));
            }
        }

        Principal::create($data);
        return redirect()->route('home.index');
    }

    public function editar()
    {
        $principais = Principal::all();
        return view('home.editar', ['principais' => $principais]);
    }

    public function edit($id)
    {
        $principal = Principal::findOrFail($id);

        foreach (['idioma', 'areas', 'formacao', 'experiencia', 'instituicao', 'grau'] as $campo) {
            $principal->$campo = json_decode($principal->$campo, true) ?? [];
        }

        return view('editar.home', ['principal' => $principal]);
    }

    public function update(Request $request, $id)
    {
        $principal = Principal::findOrFail($id);
        $data = $request->except('_token', '_method');

        if ($request->hasFile('foto')) {
          //  dd('Arquivo de foto encontrado no método store!'); // Adicione esta linha para depuração
            $path = $request->file('foto')->store('public/images');
            $data['foto'] = str_replace('public/images/', '', $path);
        }
        // Codifica os arrays para JSON antes de salvar
        foreach (['idioma', 'areas', 'formacao', 'experiencia', 'instituicao', 'grau'] as $campo) {
            if ($request->has($campo) && is_array($request->input($campo))) {
                $data[$campo] = json_encode($request->input($campo));
            }
        }

        $principal->update($data);
        return redirect()->route('home.index');
    }

    public function destroy($id)
    {
        $principal = Principal::findOrFail($id);
        // Apagar a foto associada antes de deletar o registro
        if ($principal->foto) {
            Storage::delete('public/images/' . $principal->foto);
        }
        Principal::destroy($id);
        return redirect()->route('home.index');
    }
}