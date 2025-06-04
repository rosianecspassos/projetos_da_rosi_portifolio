<!DOCTYPE html>
<!--Template de edição--> 
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Home </title> 
@vite('resources/js/app.js')

     </head> 
     <body> 
    <div class="container-fluid w-100"> 
<div class="container-fluid w-100 "> 
@yield('header')
@yield('topo')
</div> 
<div class= "container-fluid w-100"> 
@yield('content')
</div> 

</div> 

<div class="container-fluid footer bg-dark m-0 "> 
@yield('footer')
</div> 




</body> 

</html> 