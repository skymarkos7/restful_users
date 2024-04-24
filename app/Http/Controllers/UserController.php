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
                'info' => $e->getMessage()
            ], 500);
        };

        if (count($users) == 0) {
            return response()->json([
                'message' => 'Ainda não há usuários cadastrados.'
            ], 404);
        }

        return $users;
    }

    // GET
    public function getUser($id)
    {
        try {
        $users = User::find($id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao realizar a consulta.',
                'info' => $e->getMessage()
            ], 500);
        };

        if ($users == null) {
            return response()->json([
                'message' => 'O usuário buscado não existe'
            ], 404);
        }

        return $users;
    }

    // POST
    public function insertUsers(Request $request)
    {
        try {
            $users = User::create([
                'name' => 'manoela',
                'email' => 'manoela@gomes.com',
                'password'=> bcrypt('caiuNaRedea'),
            ]);

            return $users;

        } catch (\Exception $e) {
            return back()->with("Ocorreu um erro na inserção, tente inserir um usuário diferente", $e->getMessage());
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
