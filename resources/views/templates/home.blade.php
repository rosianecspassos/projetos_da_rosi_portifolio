<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Home</title> 
@vite('resources/js/app.js')

     </head> 
     <body> 
    
<div class="container-fluid nav_header w-100 "> 
@yield('header')
</div> 
<div class= "container-fluid w-100 conteudo mt-0 pt-5 pb-5 position-relative"> 
@yield('conteudo')
</div> 

    <section class=" portifolio py-5 mb-0 w-100">

@yield('projetos')
</section> 
    <section class=" cursos py-5 mt-0 mb-0 w-100">

@yield('cursos')
</section> 

    <section class="contatos pt-5 py-5 mt-0 mb-0 pt-2 pb-">
@yield('contato')
</section> 
<div class="container-fluid-xxl footer bg-dark m-0 "> 
@yield('footer')
</div> 




</body> 

</html> 