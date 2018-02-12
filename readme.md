<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
- Curso de Laravel 55 com Vue-js (Udemy - Prof.Guilherme Ferreira)
- Usar php7 e biblioteca php com sqlite
- Dicas para baixar o código fonte:
- Comando:
$ composer create-project --prefer-dist laravel/laravel blog "5.5.*"

- Rodar Servidor PHP:
- php artisan serve

> Ativar sistema de login:
- php artisan make:auth

> Criar tabelas do Banco de Dados:
- php artisan migrate

- Instalar Vue.js
- npm install
- npm run dev
- Manter vue sempre atualizando paginas
- npm run watch

> Teremos que instalar Vuex, na aula 30.
- npm i vuex --save-dev
> Configurar dentro de app.js o VUEX
- import Vuex from 'vuex';
- Vue.use(Vuex);


## Laravel resource - controller
    https://laravel.com/docs/5.5/controllers#resource-controllers

- php artisan make:controller Admin/ArtigosController --resource
## Rotas
Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){
  Route::resource('artigos', 'ArtigosController');
});

- Criar uma nova model - aula 34
- Cria uma model com comando do laravel, chamada Artigo no singular
$ php artisan make:model Artigo -m
- apos o proprio laravel cria uma migracao com nome de artigos
- Alterar nova tabela de migrate
public function up()
{
    Schema::create('artigos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('descricao');
        $table->text('conteudo');
        $table->dateTime('data');
        $table->timestamps();
        $table->SoftDeletes();
    });
}
- Apos isto rodar migrate
$ php artisan migrate


laravel-5.5-pt-BR-localization:
    https://github.com/enniosousa/laravel-5.5-pt-BR-localization
    Clonar este projeto para uma pasta dentro de resources/lang/
    cd resources/lang/
    git clone https://github.com/enniosousa/laravel-5.5-pt-BR-localization.git ./pt-BR

    obs: Você pode remover o diretório .git para poder incluir
    e versionar os arquivos deste projeto no seu repositório:
    Configurar o Framework para utilizar a linguagem como Default
        // Linha 81 do arquivo config/app.php
        'locale' => 'pt-BR',

- Criar Novo Controller para usuarios
$ php artisan make:controller Admin/UsuariosController --resource

- criar nova migraçao, para alterar tabela user acrecentando Autores
$ php artisan make:migration add_autor_table_users --table=users
$ php artisan migrate:status
$ php artisan migrate

AdminLTE:
    https://adminlte.io/themes/AdminLTE/index.html
Icones:
    http://ionicons.com/#cdn
Fontes:
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    @import url("http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css");

<p align="center">

<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>

</p>

## About
