<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastrar dados principais </title> 
@vite('resources/js/app.js')

<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function(){
        // Aqui você pode adicionar lógica para buscar o caminho da imagem atualizado
        // via AJAX após o envio do formulário, se desejar uma atualização dinâmica.
        // Para um exemplo simples, vamos assumir que a rota 'home' após o POST
        // redireciona e a nova URL da imagem está disponível de alguma forma.
    });
// Função para adicionar campos de idiomas
   function adicionarCampoIdioma() {
            var novoCampoIdioma= document.createElement("div");
            novoCampoIdioma.classList.add("Campo-idioma");
            novoCampoIdioma.innerHTML = `
                <label for="idioma[]">Idioma:</label>
                <input type="text" name="idioma[]" required>
                <button type="button" class="bg-primary text-light border-0 mt-1"onclick="removerCampo(this)">Remover</button>
                <br>
            `;
            document.getElementById("idioma-container").appendChild(novoCampoIdioma);
        }

        function adicionarCampoArea() {
            var novoCampoArea= document.createElement("div");
            novoCampoArea.classList.add("Campo-area");
            novoCampoArea.innerHTML = `
                <label for="area[]">Áreas de Interesse:</label>
                <input type="text" name="areas[]" required>
                <button type="button" class="bg-primary text-light border-0 mt-1"onclick="removerCampo(this)">Remover</button>
                <br>
            `;
            document.getElementById("area-container").appendChild(novoCampoArea);
        }

        function adicionarCampoExp() {
            var novoCampoExp= document.createElement("div");
            novoCampoExp.classList.add("Campo-exp");
            novoCampoExp.innerHTML = `
                <label for="experiencia[]">Experência:</label>
                <input type="text" name="experiencia[]" required>
                <button type="button" class="bg-primary text-light border-0 mt-1"onclick="removerCampo(this)">Remover</button>
                <br>
            `;
            document.getElementById("exp-container").appendChild(novoCampoExp);
        }

          // Função para adicionar campos de formação
          function adicionarCampoFormacao() {
            var novoCampoFormacao = document.createElement("div");
            novoCampoFormacao.classList.add("campo-formacao");
            novoCampoFormacao.innerHTML = `
                <label for="formacao[]">Formação:</label>
                <input type="text" name="formacao[]" required>
                <button type="button"   class="bg-primary text-light border-0 mt-1" onclick="removerCampo(this)">Remover</button>
                <br>
            `;
            document.getElementById("formacao-container").appendChild(novoCampoFormacao);
        }

        // Função para adicionar campos de instituição de ensino
        function adicionarCampoInstituicao() {
            var novoCampoInstituicao = document.createElement("div");
            novoCampoInstituicao.classList.add("campo-instituicao");
            novoCampoInstituicao.innerHTML = `
                <label for="instituicao[]">Instituição de Ensino:</label>
                <input type="text" name="instituicao[]" required>
                <button type="button" class="bg-primary text-light border-0 mt-1"onclick="removerCampo(this)">Remover</button>
                <br>
            `;
            document.getElementById("instituicao-container").appendChild(novoCampoInstituicao);
        }


        // Função para adicionar campos de grau da formação
        function adicionarCampoGrau() {
            var novoCampoGrau= document.createElement("div");
            novoCampoGrau.classList.add("Campo-grau");
            novoCampoGrau.innerHTML = `
                <label for="grau[]">Nível:</label>
                <input type="text" name="grau[]" required>
                <button type="button" class="bg-primary text-light border-0 mt-1"onclick="removerCampo(this)">Remover</button>
                <br>
            `;
            document.getElementById("grau-container").appendChild(novoCampoGrau);
        }

        // Função para remover campos
        function removerCampo(button) {
            button.parentElement.remove();
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