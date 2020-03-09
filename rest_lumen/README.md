# Lumen

O Lumen é um micro framework PHP desenvolvido por Taylor Otwell, o mesmo autor do famoso framework Laravel. Esse framework é voltado para o desenvolvimento de aplicações de microsserviços e APIs RESTful.

O primeiro passo seria a instalação do framework porém, antes disso, temos que instalar o Composer.

O Composer é, segundo o site dessa ferramenta: “Uma ferramenta para gerenciamento de dependências em PHP. Ele permite que você declare as bibliotecas das quais seu projeto depende e as gerenciará (instalará / atualizará) para você.” (COMPOSER, online).  
  
Para instalar o Composer no Windows, acesse: [https://getcomposer.org/download/](https://getcomposer.org/download/) baixe o executável de instalação e siga os passos.

Abaixo será detalhado uma forma de instalação e configuração do Lumen, mas você pode seguir a documentação do framework, acesse: [https://lumen.laravel.com/docs/6.x](https://lumen.laravel.com/docs/6.x)

Abra um CMD e navegar até a pasta onde o projeto será criado. No caso do projeto que estamos seguindo, navegue até *C:\xampp\htdocs\DSI_Exemplos\rest_lumen*.

> Se você efetuar o downlod desse código pronto, execute composer update dentro da pasta do projeto para atualizar as suas bibliotecas.

Execute no cmd o seguinte comando: composer global require *laravel/lumen-installer*

Depois de efetuado download do Lumen, vamos criar uma aplicação. Execute o comando: *lumen new RESTful*

Aplicação criada, acesse o Sublime e observe a estrutura de pastas desse projeto.

![](https://lh3.googleusercontent.com/LfrpKriq6lfjRJRf2RSXqFX8PCxkQHM7h_9mLxxiLrG78gLRW3TP4w6WDX4ElYgHwYv9XX8mNhgVFrvHbSA5GOuhfamQPZ_Wh0MzEZr2f9VxvYaod1-TBpacyanBW9JJnvyMVik0)

> Figura 1: Estrutura de pastas do projeto com Lumen.

Utilizaremos alguns desses diretórios, como o “routes” e o “app”. Nesse exemplo não vamos configurar o Apache via Xampp. Caso você queira tentar essa abordagem, acesse: [https://medium.com/@bluestar/setting-up-laravel-project-on-windows-2aa7e4f080da](https://medium.com/@bluestar/setting-up-laravel-project-on-windows-2aa7e4f080da)

Inicialmente, para testarmos nossa instalação e configuração do Lumen, execute os seguintes comandos:
-   cd rest_lumen
-   php -S localhost:8000 -t public

Acesse no seu navegador: [http://localhost:8000/](http://localhost:8000/) será exibido o texto: *Lumen (6.3.3) (Laravel Components 6.0.^*)*.

Vamos entender o motivo desse texto ter sido exibido. No Sublime, acesse a pasta *C:\xampp\htdocs\DSI_Exemplos\rest_lumen\routes* e abra o arquivo “web.php”.

Esse arquivo é responsável por criar as rotas, redirecionar a nossa URL digitada para os métodos que irão tratar nossa requisição. Nesse arquivo, a URL “/” é tratada com um retorno da versão do Lumen. Observe que a URL “/” é a nossa raiz, vamos criar outras rotas para nossas URL’s a partir de “/”. Altere o arquivo e deixe-o assim:

```php
    <?php
    $router->get('/', function () use ($router) {
	    return 'Olá Lumen';
    });
```

Acesse a url no navegador.

Abra o Painel de controle do XAMPP e inicie o MySQL e o Apache. O Apache somente será necessário para executar o phpMyAdmin para criarmos o banco de dados. Agora iremos configurar o Lumen para acessar o banco. Renomeie o arquivo “.env.example”, na raiz do projeto, para “.env” e abra esse arquivo. Configure-o conforme abaixo:

	APP_NAME=api_exemplo
	APP_ENV=local
	APP_KEY=
	APP_DEBUG=true
	APP_URL=http://localhost
	APP_TIMEZONE=UTC

	LOG_CHANNEL=stack
	LOG_SLACK_WEBHOOK_URL=

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=restAPI
	DB_USERNAME=root
	DB_PASSWORD=

	CACHE_DRIVER=file
	QUEUE_CONNECTION=sync

Essa dica vale para o Windows 7 e 8: Abra outra janela do CMD e navegue até a pasta. Aquela primeira está com o servidor aberto, então aconselho você a ir na pasta do projeto, pressionar o shift + o botão direito na pasta e no menu clicar em “Abrir janela de comando aqui”.

Para o Windows 10, basta abrir novamente um CMD através do menu iniciar. 

Execute o comando: *php artisan make:migration create_pessoas_table --create=pessoas*

Isso irá criar um arquivo dentro da pasta *C:\xampp\htdocs\DSI_Exemplos\rest_lumen\database\migrations*. O nome do arquivo inicia pela data de criação. Altere o arquivo para atender a nossa demanda, veja o código abaixo da função up:

  
```php
public function up()
{
	Schema::create('pessoas', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->string('nome');
		$table->integer('idade');
		$table->string('sexo');
		$table->string('estado_civil');
		$table->string('endereco');
		$table->string('usuario');
		$table->string('senha');
		$table->timestamps();
	});
}
```
Configure o arquivo *C:\xampp\htdocs\DSI_Exemplos\rest_lumen\bootstrap\app.php*. Remova os comentários das linhas 24 e 26, habilitando os seguintes comandos:

```php
$app->withFacades();
$app->withEloquent();
```

Crie o banco de dados no phpMyAdmin acessando: [https://localhost/phpmyadmin](https://localhost/phpmyadmin).

Clique em new no menu lateral a esquerda e configure conforme abaixo:

![](https://lh4.googleusercontent.com/ULIjrPCw3cfHjHNw8u-C-7w9m7CGmjK9etaB4wVeNTf1EuKXcXnEBjEz4SJsoh7jLzmFBKSLC17OPei86QW0mXApZf-QEFZBb3KllqkBdjNztOSyFClD7N-2pmBYrk1XJ3Nnwkxw)

> Figura 2: Criando base de dados usando o phpMyAdmin

Execute o comando: *php artisan migrate*

A tabela “pessoas” deve ter sido criada, verifique no phpMyAdmin.
Vamos inserir os dados no nosso banco. Abra o arquivo routes/web.php e crie uma função para inserir os dados no banco. Para isso, inclua a seguinte linha ao final do arquivo: 
```php
$router->get('populatedb', 'ExampleController@populateDB');
```

Essa linha de código cria uma função que irá tratar a URL “/populatedb” criando uma closure para o arquivo “ExampleController” onde haverá uma função chamada “populateDB”.

Saiba mais sobre closures aqui: [https://imasters.com.br/back-end/apresentando-o-conceito-de-closures](https://imasters.com.br/back-end/apresentando-o-conceito-de-closures)

O Lumen utiliza o MVC como padrão, por isso Model e Controller separados. Mais sobre MVC: [https://tableless.com.br/mvc-afinal-e-o-que/](https://tableless.com.br/mvc-afinal-e-o-que/)

Abra então o arquivo ExampleController, na pasta app/http/Controllers e implemente o código conforme abaixo:
```php
<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model{
}

class ExampleController extends Controller
{
		public function __construct(){
		}

		public function populateDB()
		{
		$pessoas = new Pessoas;
		$pessoas->nome = 'carlos';
		$pessoas->idade = 30;
		$pessoas->sexo = 'M';
		$pessoas->estado_civil = 'solteiro';
		$pessoas->endereco = 'rua B no 01';
		$pessoas->usuario = 'cpelegrin';
		$pessoas->senha = sha1(123456);
		$pessoas->save();

		$pessoas = new Pessoas;
		$pessoas->nome = 'jose';
		$pessoas->idade = 50;
		$pessoas->sexo = 'M';
		$pessoas->estado_civil = 'casado';
		$pessoas->endereco = 'rua B no 02';
		$pessoas->usuario = 'jose_vieira';
		$pessoas->senha = sha1(456789);
		$pessoas->save();

		$pessoas = new Pessoas;
		$pessoas->nome = 'maria';
		$pessoas->idade = 35;
		$pessoas->sexo = 'F';
		$pessoas->estado_civil = 'casada';
		$pessoas->endereco = 'rua C no 01';
		$pessoas->usuario = 'maria';
		$pessoas->senha = sha1(987654);
		$pessoas->save();

		$pessoas = new Pessoas;
		$pessoas->nome = 'camila';
		$pessoas->idade = 20;
		$pessoas->sexo = 'F';
		$pessoas->estado_civil = 'solteira';
		$pessoas->endereco = 'rua C no 01';
		$pessoas->usuario = 'mila123';
		$pessoas->senha = sha1(123789);
		$pessoas->save();

		return "Dados inseridos no Banco";
		}
	}
  ```

Agora acesse a página [http://localhost:8000/populatedb](http://localhost:8000/populatedb) e depois verifique no phpMyAdmin que os dados foram inseridos. Se você atualizar a página os dados serão inseridos novamente.

Falta então nossos métodos de leitura. Conforme você percebeu, temos que criar uma função nas rotas e o corpo da função estará no controller.

No arquivo route/web.php, inclua as seguintes linhas de código:
```php
$router->get('get_names', 'ExampleController@get_names');

$router->get('get_names_and_ages', 'ExampleController@get_names_and_ages');

$router->get('get_age_by_name/{name}', 'ExampleController@get_age_by_name');
```

E no arquivo app/http/Controllers/ExampleControllers.php, inclua “use DB;” na linha 6 e as seguintes linhas de código ao final do arquivo:
```php
public function get_names()
{
	return $results = DB::select("SELECT nome FROM pessoas");
}

public function get_names_and_ages()
{
	return $results = DB::select("SELECT nome, idade FROM pessoas");
}

public function get_age_by_name($name)
{
	return $results = DB::select("SELECT idade FROM pessoas WHERE nome='$name'");
}
```
  
Basta acessar as URL’s correspondentes e ver os resultados.

Para mais informações sobre o Lumen, acesse: [https://lumen.laravel.com/docs/6.x](https://lumen.laravel.com/docs/6.x)

# Bibliografia

COMPOSER. Getting Started. Disponível em: [https://getcomposer.org/doc/00-intro.md](https://getcomposer.org/doc/00-intro.md). Acesso em 09/03/2020.


