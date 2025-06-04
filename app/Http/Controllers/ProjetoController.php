<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
class ProjetoController extends Controller
{
    public function index()
    {
        //Retorna para a página de projetos
      $projetos = Projeto::all(); 
     return view('projetos.index', ['projetos' => $projetos]); 
    }

  // Retorna formulário de cadastro
  public function create()
  {
      return view('cadastros.projetos');
  }



  public function store(Request $request)
  {
    $nomes = $request->input('nome_projeto');
    $links = $request->input('link');
    $descricoes = $request->input('descricao');
    $imagens = $request->file('imagens');
   
    
    if (is_array($nomes) && is_array($links) && is_array($descricoes) && is_array($imagens)) {
        foreach ($nomes as $index => $nome) {
            if (isset($imagens[$index])) {
                $caminho = $imagens[$index]->store('projetos', 'public');
    
                Projeto::create([
                    'imagem' => $caminho, // Use $caminho diretamente, pois store() retorna uma string
                    'nome_projeto' => $nome,
                    'link' => $links[$index] ?? null, // Use um valor padrão caso o índice não exista
                    'descricao' => $descricoes[$index] ?? null, // Use um valor padrão caso o índice não exista
                ]);
            }
        }
    } else {
        // Tratar o caso em que os inputs não são arrays
        // (ex: exibir uma mensagem de erro ou salvar um único projeto)
    }
  
      return redirect()->route('projetos.index')->with('success', 'Projetos salvos!');
  }

//Página editar
public function editar()
{
    $projetos = Projeto::all();
    return view('projetos.editar', ['projetos' => $projetos]);
}

public function edit($id)
{
    $projeto = Projeto::findOrFail($id); // Aqui você pega um único projeto
    return view('editar.projetos', ['projeto' => $projeto]); // Passa o projeto único
}



// Atualiza os dados de um registro específico
public function update(Request $request, $id)
{
    $request->validate([
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'nome_projeto' => 'required|string|max:255',
        'link' => 'nullable|url',
        'descricao' => 'required|string',
    ]);

    $projeto = Projeto::findOrFail($id);

    $data = [
        'nome_projeto' => $request->nome_projeto,
        'link' => $request->link,
        'descricao' => $request->descricao,
    ];
    if ($request->hasFile('imagem')) {
        $file = $request->file('imagem');
        $filename = $file->store('projetos', 'public'); // Salva no storage/app/public/projetos
        $data['imagem'] = $filename;
    
        // Opcional: apagar a imagem anterior do disco, se quiser
        if ($projeto->imagem && \Storage::disk('public')->exists($projeto->imagem)) {
            \Storage::disk('public')->delete($projeto->imagem);
        }
    }
    
    $projeto->update($data);

    return redirect()->route('projetos.index')->with('success', 'Projeto atualizado com sucesso!');
    }
    
   




// Deleta um registro específico
public function destroy($id)
{
    Projeto::destroy($id);
    return redirect()->route('projetos.index');
}
}
  




/*
Rodar php artisan storage:link uma vez para criar o link simbólico do storage para public.

Garantir que o diretório storage/app/public/projetos tenha permissão de escrita.

Quer que eu te ajude a montar esse formulário num layout bonitinho com Bootstrap também?



 */
