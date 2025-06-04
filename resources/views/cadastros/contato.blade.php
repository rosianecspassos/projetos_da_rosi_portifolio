<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastrar dados principais </title> 
@vite('resources/js/app.js')

     </head> 
     <div class="container m-5">
        <div class="btnAcesso">
     @include('profile.navlogin')
    </div>
        <h4 class="mb-4 text-center">Cadastro de Contatos</h4> 
     <form action="" method="POST">



     <div class="container text-center"> 
     <button type="submit" class="bg-primary text-light border-0 mt-1 mb-4">Enviar</button>
    </div> 
    </form> 
    </div>
     <body> 
</body>
</html>