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

## Rodar o projeto

Agora é só rodar `php artisan serve` em _./front-chamados_ e depois em _./api-chamados_

Após isso é só acessar atraves do [localhost](http://localhost:8000/)

### Lembrete

Confirme que o backend esteja rodando na porta 3001, caso essa porta esteja ocupada faça a mudança no .env de _./front-chamados_ na opção de `API_URL` para a porta correta.
