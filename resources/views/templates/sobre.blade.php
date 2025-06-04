<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Sobre</title> 
@vite('resources/js/app.js')

     </head> 
     <body> 
    
<div class="container-fluid nav_header w-100 "> 
@yield('header')
</div> 
<div class= "container-fluid w-100 conteudo mt-0 pt-5 pb-5 position-relative"> 
@yield('conteudo')
</div> 

<div class="container-fluid portifolio w-100 mt-0 pt-1 pb-5"> 

</div> 
<div class="container-fluid w-100 cursos w-100 pt-2 pb-5"> 
@yield('cursos')
</div> 





<div class="container-fluid-xxl footer bg-dark m-0 "> 
@yield('footer')
</div> 

</div>


</body> 

</html> 