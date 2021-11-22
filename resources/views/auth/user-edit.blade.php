<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script class="jsbin" src="{{asset('js/jquery.min.js')}}"></script>
    <script class="jsbin" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script class="jsbin" src="{{asset('js/jquery.easing.min.js')}}"></script>

    <script class="jsbin" src="{{asset('js/jquery-ui.min.js')}}"></script>

    <script src="{{asset('js/fontawesome.js')}}"></script>
    <script src="{{asset('js/fontawesome.min.js')}}"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')}}">

    <link class="jsbin" href="{{asset('js/jquery-ui.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('css/register-user.css')}}">

    <title>Portal Mão Amiga - Editar usuário</title>
</head>

<body>
    <!-- MultiStep Form -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
            <div class="text-center"
                style="font-family: 'Montserrat Alternates', sans-serif;
                    font-size: 1em;
                    font-weight: bold;
                    font-style: italic;
                    color: #00AEEF">
                    <img src="{{asset('img/icone-site.png')}}" alt="" style="width: 5%"> <br>
                Editar usuário
            </div>
            
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form id="msform" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">Avatar</li>
                    <li>Nome</li>
                    <li>Data de nascimento</li>
                    <li>Gênero</li>
                    <li>Surdez</li>
                    <li>Instituição</li>
                    <li>Área de ensino</li>
                </ul>
                <!-- fieldsets -->

                <!-- Image -->
                <fieldset>
                    <x-label class="input-label" for="avatar" :value="__('Avatar')" /> <br>
                
                    <img src="{{ url("storage/$user->avatar") }}" id="change" class="avatar">
                
                    <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" class="avatarInput" onchange="readURL(this);" />

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                
                </fieldset>

                <!-- Name -->
                <fieldset>
                    <img class="form-img" src="{{asset('img/form-sinais/nome.jpg')}}" alt=""> <br>
                    <x-label class="input-label" for="name" :value="__('Nome')" /> <br>
                    <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{ $user->name }}" required autofocus />

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Birthday -->
                <fieldset>
                    <img class="form-img img-nascimento" src="{{asset('img/form-sinais/nascimento.jpg')}}" alt=""> <br>
                    <x-label class="input-label" for="birthday" :value="__('Data de nascimento')" /> <br>
                    <div class="form-group row" >
                        <div class="col-10">
                            <input class="form-control" type="text" id="birthday" name="birthday"
                                :value="old('birthday')" value="{{ $user->birthday }}" onfocus="(this.type='date')" required>
                        </div>
                    </div>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Gender -->
                <fieldset>
                    <img class="form-img" src="{{asset('img/form-sinais/genero.jpg')}}" alt=""> <br>
                    <x-label class="input-label" for="gender" :value="__('Gênero')" />

                    <div class="form-check">
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Masculino">
                            Masculino
                        </label>

                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Feminino">
                            Feminino
                        </label>

                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Não-binário">
                            Não-binário
                        </label>
   
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Outro">
                            Outro
                        </label>
                    </div>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Deaf -->
                <fieldset>
                    <img class="form-img" src="{{asset('img/form-sinais/surdo.jpg')}}" alt=""> <br>
                    <x-label class="input-label" for="deaf" :value="__('Você é surdo?*')" />

                    <div class="form-check">
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="deaf" id="deaf" value="Sim" required>
                            <i class="fas fa-thumbs-up"></i> Sim
                        </label>
  
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="deaf" id="deaf" value="Não" required>
                            <i class="fas fa-thumbs-down"></i> Não
                        </label>
                    </div>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Institution -->
                <fieldset>
                    <img class="form-img img-nascimento" src="{{asset('img/form-sinais/instituicao.jpg')}}" alt=""> <br>
                    <x-label class="input-label" for="intitution" :value="__('Instituição de ensino')" /> <br>

                    <input id="institution" class="block mt-1 w-full" type="text" name="institution" value="{{ $user->institution }}" />

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>
                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Grade -->
                <fieldset>
                    <img class="form-img" src="{{asset('img/form-sinais/nivel.jpg')}}" alt=""> <br>
                    <x-label class="input-label" for="grade" :value="__('Qual área de ensino você está atualmente?')" /> <br>

                    <select name="grade" class="form-select" aria-label="Default select example" id="grade">
                        <option value="Infantil">Infantil</option>
                        <option value="Fundamental">Fundamental</option>
                        <option value="Médio">Médio</option>
                        <option value="Superior">Superior</option>
                        <option selected value="Livre">Livre</option>
                    </select> <br>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>

                    <div>
                        <x-button class="action-button" style="background-color: #00da6d">
                            <i class="fas fa-check"></i> {{ __('Atualizar') }}
                        </x-button>
                    </div>
                    
                </fieldset>

            </form>

            <!-- /.link to designify.me code snippets -->
        </div>
    </div>
    <!-- /.MultiStep Form -->
</body>

<script class="jsbin" src="{{asset('js/slideForm.js')}}"></script>
<script class="jsbin" src="{{asset('js/avatar.js')}}"></script>

</html>