<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Home</title> 
@vite('resources/js/app.js')
     </head> 
    <body class="bg-light">
@yield('header')
  <main class="container mt-4">
@yield('conteudo')

    <section class="mt-5">
@yield('projetos')

</section> 
    <section class="mt-5">

@yield('contato')
</section> 
</main>
  <!-- Footer -->
  <footer class="bg-dark text-light mt-5 py-4">
@yield('footer')
</footer> 
</body> 
</html> 
