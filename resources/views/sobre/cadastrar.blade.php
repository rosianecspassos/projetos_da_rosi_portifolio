<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastrar dados principais </title> 
@vite('resources/js/app.js')
<script type="text/javascript">
// Função para adicionar campos Cursos e Competencias 
    function adicionarCampoCurso() {
        var novoCampoCurso = document.createElement("div");
        novoCampoCurso.classList.add("mb-3"); // Adiciona margem inferior
        novoCampoCurso.innerHTML = `
            <label for="curso[]" class="form-label">Curso:</label>
            <input type="text" name="curso[]" class="form-control" required>
            <label for="link_curso[]" class="form-label mt-2">Link do curso:</label>
            <input type="url" name="link_curso[]" class="form-control">
            <label for="desc_curso[]" class="form-label mt-2">Descrição do Curso:</label>
            <textarea class="form-control" name="desc_curso[]" rows="3"></textarea>
            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removerCampo(this)">Remover</button>
            <hr class="my-3"> `;
        document.getElementById("curso-container").appendChild(novoCampoCurso);
    }

    function adicionarCampoCompetencia() {
        var novaCompetencia = document.createElement("div");
        novaCompetencia.classList.add("mb-3"); // Adiciona margem inferior
        novaCompetencia.innerHTML = `
            <label for="competencia[]" class="form-label">Competências:</label>
            <input type="text" name="competencia[]" class="form-control" required>
            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removerCampo(this)">Remover</button>
            <hr class="my-3"> `;
        document.getElementById("competencia-container").appendChild(novaCompetencia);
    }

    function removerCampo(button) {
        button.closest('.mb-3').remove(); // Remove o div pai completo
    }
</script>
     </head> 
<body> 
<div class="container-fluid w-100 "> 
@yield('header')
@yield('topo')
</div> 

<div class= "container-fluid w-100"> 
@yield('formulario')
</div> 
<div class="container-fluid footer bg-dark m-0 "> 
@yield('footer')
</div> 


</body> 

     
</html>