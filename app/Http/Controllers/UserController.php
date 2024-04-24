<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Desenvolva uma api RESTful em PHP para criar, atualizar, deletar e listar todos os
     * usuários. As informações devem ser salvas em um banco de dados MySQL.
     * O endpoint deve retornar os dados em formato JSON e permitir operações GET, POST,
     * PUT e DELETE para manipular os registros de usuário.
     * Considere aspectos como segurança, validação de entrada e tratamento de erros. O exame
     * deverá ser entregue através do link do projeto no Git.
     * Desejável que utilize Laravél ou CodeIgniter 3.
     */


    // GET
    public function getAllUsers()
    {
        try {
            $users = User::all();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao realizar a consulta.',
                'info' => $e->getMessage(),
                'code' => 500
            ], 500);
        };

        if (count($users) == 0) {
            return response()->json([
                'message' => 'Ainda não há usuários cadastrados.',
                'code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $users,
            'code' => 200
        ], 200);
    }

    // GET
    public function getUser($id = null)
    {
        if(is_null($id)) return response()->json(['message' => 'Você enqueceu de informar o ID do usuário'], 400);

        try {
            $users = User::find($id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao realizar a consulta.',
                'info' => $e->getMessage(),
                'code' => 500
            ], 500);
        };

        if ($users == null) {
            return response()->json([
                'message' => 'O usuário buscado não existe',
                'code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $users,
            'code' => 200
        ], 200);
    }

    // POST
    public function insertUsers(Request $request)
    {
        try {
            $userExist = User::where('email', $request->email)
                ->exists();

            if ($userExist) return response()->json(['message' => 'Já existe um usuário cadastrado com o mesmo email', 'erro' => 406], 406);

            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return response()->json([
                'message'=> 'O usuário foi inserido com sucesso!',
                'data' => $users
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao realizar a inserção',
                'info' => $e->getMessage()
            ], 500);
        }
    }

    // PUT
    public function updateUser(Request $request)
    {
        $users = User::all();
    }

    // DELETE
    public function deletetUser(Request $request)
    {
        $users = User::all();
    }
}
