<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Projetos </title> 
@vite('resources/js/app.js')

     </head> 

    
<body class="bg-light">
@yield('header')

  <main class="container py-5">
@yield('conteudo')
</main>
  <footer class="bg-dark text-light py-4">
@yield('footer')
  </footer>


</body> 

</html> 