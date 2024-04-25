<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

### From run
 - sss
 - sss 

## Methodologies
- Utilizado softDelete.
    - Assim é possível apagar dados de uma tabela importante com a possibilidade de acessar o dado posteriormente.
    - Ao listar todos os usuários não será listado os usuários com marcação de deletado, o próprio ORM do laravel filtra os dados.

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

- <b>POST: api/user/insert</b>    
    - Verica se a comunicação com o banco de dados ocorreu como esperado.
        - Se bem sussedida continua e retorna os dados inseridos e o código de sucesso (201).
        - Caso contrário retorna uma msg e o código (500)
    - Verifica se já possui um usuario com o mesmo email
        - Caso já exista é retornado essa informação e o código (406)
    - Caso tente inserir um novo usuário sem todos os campos obrigatórios ["nome, email, password"], receberá uma mensagem informando e o código (400).

- <b>PUT: api/user/update/{id}</b>    
    - Verica se a comunicação com o banco de dados ocorreu como esperado.
        - Se bem sussedida continua e retorna os dados inseridos e o código de sucesso (201).
        - Caso contrário retorna uma msg e o código (500)
    - Caso tente atualizar um usuário sem todos os campos obrigatórios ["nome, email, password"], receberá uma mensagem informando e o código (400).
    - Verifica se foi informado algum ID
        - Caso não tenha informado, é pedido que faça uma nova solicitação passando um ID, Erro na requisição (400)
    - Caso tente atualizar um usuário usando um email já cadastrado para outro usuário, receberá uma mensagem de erro e um detralhamento de INFO sobre o erro.
    - Verifica se existe um usuário não deletado com o id informado, caso não haja é retornado uma mensage com o código de erro (406)

- <b>DELETE: api/user/delete/{id}</b>
    - Verica se a comunicação com o banco de dados ocorreu como esperado.
        - Se bem sussedida continua e retorna os dados inseridos e o código de sucesso (201).
        - Caso contrário retorna uma msg e o código (500)
    - Verifica se foi informado algum ID
        - Caso não tenha informado, é pedido que faça uma nova solicitação passando um ID, Erro na requisição (400)
    - Verifica se existe um usuário não deletado com o id informado, caso não haja é retornado uma mensage com o código de erro (406)        

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
