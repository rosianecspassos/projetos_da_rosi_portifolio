<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastrar dados principais </title> 
@vite('resources/js/app.js')
<script>
function adicionarCampo(containerId, name) {
    const container = document.getElementById(containerId);
    const input = document.createElement("input");
    input.type = "text";
    input.name = name + "[]";
    input.className = "form-control mb-2";
    input.required = true;
    container.appendChild(input);
}

function adicionarCampoIdioma() {
    adicionarCampo("idioma-container", "idioma");
}

function adicionarCampoArea() {
    adicionarCampo("area-container", "areas");
}

function adicionarCampoFormacao() {
    adicionarCampo("formacao-container", "formacao");
}

function adicionarCampoInstituicao() {
    adicionarCampo("instituicao-container", "instituicao");
}

function adicionarCampoExp() {
    adicionarCampo("exp-container", "experiencia");
    
}

function adicionarCampoGrau() {
    adicionarCampo("grau-container", "grau");
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
