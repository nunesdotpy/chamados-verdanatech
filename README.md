# Sistema de Chamados

## Projeto

O projeto tem 2 monolitos, um _./api-chamados_ com todo o backend e regra de negocios e o _./front-chamados_ com toda parte de front e interface.

## Dependências
Algumas dependências são necessárias pro projeto, sendo elas o Composer para rodar o Laravel, TailwindCss e a criação do banco de dados (feita através da migration).

### Configurando o ambiente
em ambas as pastas _./api-chamados_ e _./front-chamados_ rode `composer install`

em _./front-chamados_ precisamos instalar

***TailwindCss***

`npm install -D tailwindcss postcss autoprefixer`

`npx tailwindcss init -p`

`npm run build`

No backend _./api-chamados_ precisamos rodar nossas Migrates para o banco de dados ser criado, podemos fazer isso através do comando: `php artisan migrate`

## Configurações do .env
O .env de ambos os ambientes foi disponibilizado no GitHub para facilitar a execução dos ambientes.