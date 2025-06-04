<div class="menuacesso position-absolute top-0 end-0 justify-content-end mt-4 mb-2"> 
<button class="dropbtn">Acesso</button>
  <div class="dropdown-content">

    <!--Cadastrar dados principais sobre mim--> 
    <a href="{{route('register')}}">Dados principais</a>
    <!--Cadastrar home--> 
        <a href="{{route('home.create')}}">Cadastrar home</a>
        
    <!--Cadastrar sobre --> 
    <a href="{{route('sobre.create')}}">Cadastrar Sobre</a>
    <!--Cadastrar projetos--> 
    <a href="{{route('projetos.create')}}">Cadastrar Projetos</a>
 <!--Cadastrar no site --> 
 <a href="{{route('register')}}">Cadastrar usuário</a>
    <!--Entrar na conta--> 
    <a href="{{route('dashboard')}}">Perfil</a>
    <!--Voltar para tela de login-->

       <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                 <a  href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"> Logout
                          
                    </a> 
                </form>



  </div>
</div> 
  </div>

