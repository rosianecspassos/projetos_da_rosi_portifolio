<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Projetos </title> 
@vite('resources/js/app.js')

     </head> 
     <body> 
    
<div class="container-fluid nav_header w-100 "> 
@yield('header')
</div> 


<div class="container-fluid portifolio w-100 mt-0 pt-1 pb-5"> 
@yield('conteudo')
</div> 

<div class="container-fluid-xxl footer bg-dark m-0 "> 
@yield('footer')
</div> 

</div>


</body> 

</html> 