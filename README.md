<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About project
### For run:
 - Clone o repositório `git clone https://github.com/skymarkos7/restful_users.git`
 - Instale as dependências do projeto rodando `composer install` na raiz do projeto
 - Crie a base de dados inicial para salvar os usuários, com um servidor mysql rodando na máquina rode o comando `php artisan migrate` na raiz do projeto
 - Finalmente inicie o servidor do projeto `php artisan serve`  
 > Caso tenha problemas ao rodar o projeto, busque mais detalhes em https://laravel.com/docs/11.x

 ### What was requested:
 - Arquivo de desafio [aqui](Teste-Técnico.pdf) na raiz do projeto para consulta.
    - Perguntas técnicas.
    - Desafio técnico.

### what are the routes:
 > O arquivo com a collection para importação fácil no postman está [aqui](resful-users.postman_collection.json) na raiz do projeto, basta realizar a importação.  
 > Você também pode simplesmente criar e popular as chamadas manualmente aos endpoints. Você encontrará os endpoints no arquivo [api.php](routes\api.php) do projeto.
- <b>GET</b> /user/getall
    - não exige nenhum parametro.
- <b>GET</b> /user/get/{id}
    - espera requeceber um parâmetro ID de usuário pela url no formato inteiro.
- <b>POST</b> /user/insert  
    - espera receber no corpo da requisição no formato form-data os dados:
        - name : string
        - email : string em formato de email válido
        - password : string
- <b>PUT</b> /user/update/{id}  
    - espera receber no corpo da requisição no formato json os dados:
        - name : string
        - email : string em formato de email válido
        - password : string
    - espera receber um ID de usuário na url em formato inteiro.
- <b>DELETE</b> /user/delete/{id}
    - espera requeceber um parâmetro ID de usuário pela url no formato inteiro.            


## Methodologies
- Utilizado softDelete.
    - Assim é possível apagar dados de uma tabela importante com a possibilidade de acessar o dado posteriormente.
    - Ao listar todos os usuários não será listado os usuários com marcação de deletado, o próprio ORM do laravel filtra os dados.
- Aplicado validações para a entrada de dados do usuário e antecipação de comportamentos inesperados.  
- Lógica de validação de dados separada em funções menores para reaproveitamento de código.
- Commits realizados em branchs Develop para seguir as boas práticas de uso git. 

## Validations
- <b>GET: api/user/getll</b>
    - Verica se a operação com banco de dados ocorreu como esperado.
        - Se bem sussedida continua a execução.
        - Caso contrário retorna uma msg personalizada e o código (500)
    - Verifica se existe algum registro no banco de dados.
        - Se existe lista todos que não estejam marcados como apagado com o código de Sucesso (200).
        - Se não existe registros informa que não há dados no banco, código (204)

- <b>GET: api/user/get/{id}</b> 
    - Verica se a operação com banco de dados ocorreu como esperado.
        - Se bem sussedida continua a execução.
        - Caso contrário retorna uma msg e o código (500)
    - Verifica se o ID do usuário consultado existe no banco.
        - Se existe lista o usuário com o código de Sucesso (200).
        - Se não existe o registro informa que o usuário não existe no banco, código (204).
    - Verifica se foi informado algum ID
        - Caso não tenha informado, é pedido que faça uma nova solicitação passando um ID, Erro na requisição (400)
    - Forçado o uso de número inteiro para o ID, code (400).  

- <b>POST: api/user/insert</b>    
    - Verica se a comunicação com o banco de dados ocorreu como esperado.
        - Se bem sussedida continua e retorna os dados inseridos e o código de sucesso (201).
        - Caso contrário retorna uma msg e o código (500)
    - Verifica se já possui um usuario com o mesmo email
        - Caso já exista é retornado essa informação e o código (406)
    - Caso tente inserir um novo usuário sem todos os campos obrigatórios ["nome, email, password"], receberá uma mensagem informando e o código (400).
    - Inserido validações para o formato dos campos de name, email e password, caso o formato não seja igual ao esperado retornará uma mensagem informando e o código referente a semantica incorreta (422)

- <b>PUT: api/user/update/{id}</b>    
    - Verica se a comunicação com o banco de dados ocorreu como esperado.
        - Se bem sussedida continua e retorna os dados inseridos e o código de sucesso (201).
        - Caso contrário retorna uma msg e o código (500)
    - Caso tente atualizar um usuário sem todos os campos obrigatórios ["nome, email, password"], receberá uma mensagem informando e o código (400).
    - Verifica se foi informado algum ID
        - Caso não tenha informado, é pedido que faça uma nova solicitação passando um ID, Erro na requisição (400)
    - Caso tente atualizar um usuário usando um email já cadastrado para outro usuário, receberá uma mensagem de erro e um detralhamento de INFO sobre o erro.
    - Verifica se existe um usuário não deletado com o id informado, caso não haja é retornado uma mensage com o código de erro (406)
    - Forçado o uso de número inteiro para o ID, code (400).

- <b>DELETE: api/user/delete/{id}</b>
    - Verica se a comunicação com o banco de dados ocorreu como esperado.
        - Se bem sussedida continua e retorna os dados inseridos e o código de sucesso (201).
        - Caso contrário retorna uma msg e o código (500).
    - Verifica se foi informado algum ID.
        - Caso não tenha informado, é pedido que faça uma nova solicitação passando um ID, Erro na requisição (400).
    - Verifica se existe um usuário não deletado com o id informado, caso não haja é retornado uma mensage com o código de erro (406).
    - Forçado o uso de número inteiro para o ID, code (400).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
