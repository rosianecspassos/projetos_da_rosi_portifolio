<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alterar projetos </title> 
@vite('resources/js/app.js')



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
