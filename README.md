## Ambiente utilizado

Ambiente construindo utilizando container, via docker.

> Mysql 5.7.24

> Nginx 1.16

> php 7.2.19

> Laravel 6.2

O repositório contem duas pastas: `backend` e `frontend`, onde cada uma tem isolado os respectivos códigos.
Logo abaixo tem os passos para subir cada uma das aplicações.

Será necessário abrir duas janelas do terminal, uma em cada basta: frontend e backend.

## Setup initial BACKEND

Execute os seguintes passos abaixo, em um console, após clonar esse repositório:

> composer install -vvv

> cp envvars\local.env .env

> php artisan key:generate

Agora, configure o arquivo `config/database.php` e defina o nome da base de dados.
Lembre-se que o usuário necessitará de acessos *root* para criar as tabelas.

> php artisan config:clear

> php artisan cache:clear

> php artisan migrate:install

> php artisan migrate

Se ocorreu tudo bem, as tabelas foram criadas no banco definido no `config/database.php`.

Agora, execute o comando abaixo para criar o registros de acesso padrão.

> php artisan db:seed

Feito isso, execute o seguinte comando para subir o backend:

> php artisan serve --port=8081


## Setup initial FRONTEND

Agora, abra uma nova janela... Tomando o cuidado para que o ultimo comando ainda continue rodando

Execute os seguintes passos abaixo, em um console, após clonar esse repositório:

> composer install -vvv

> cp envvars\local.env .env

> php artisan key:generate

> php artisan config:clear

> php artisan cache:clear

Agora, dentro da pasta `config/app.php` tem a configuração `url_api_endpoint` com o valor setado `http://127.0.0.1:8081/`

Esse valor corresponde ao endereço do backend levantado na etapa de backend. Confirme se o endereço corresponde (a `/` no final é super importante).

Caso o valor não corresponda, modifique e rode os comandos:

> php artisan config:clear

> php artisan cache:clear

Feito isso, rode o comando:

> php artisan serve

Agora vá ao navegador e acesso o sistema pela url gerada no comando anterior, utilizando as seguintes credências de acesso:

> **login:** admin@admin.com

> **password** admin123

BOM PROVEITO!!!!