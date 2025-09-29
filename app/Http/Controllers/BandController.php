<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class BandController extends Controller
{


    //funcao para listar todas as bandas
    public function getALL()
    {

        $bandas = $this->getBand();

        return response()->json([
            'message' => 'Listando todas as bandas:',
            'data' => $bandas
        ]);
    }

    //funcao para retornar a banda pelo ID
    public function getById($id)
    {

        try {
            $banda = null;
            foreach ($this->getBand() as $band) {
                if ($band['id'] == $id)
                    $banda = $band;

            }
            if (!$banda) {
                throw new Exception("Você solicitou uma banda que não existe", 404);
            }
            return response()->json($banda);
        } catch (Exception $e) {
            return $e->getMessage();
        }


    }


    //funcao para retornar a banda pelo Gênero
    public function getByGenero($genero)
    {
        try {
            $banda = [];

            foreach ($this->getBand() as $band) {
                if (strtolower($band['gênero']) == strtolower($genero)) {
                    $banda[] = $band;
                }
            }

            if (!$banda) {
                throw new Exception("Não foi encontrada nenhuma banda do gênero: " . $genero, 404);
            }

            return response()->json($banda);

        } catch (Exception $e) {
            return response()->json([
                'erro' => $e->getMessage()
            ], $e->getCode() ?: 400);
        }
    }


    //funcao para listar as bandas
    protected function getBand()
    {
        return [
            [
                'id' => 1,
                'nome' => 'Vida Reluz',
                'gênero' => 'Gospel'
            ],
            [
                'id' => 2,
                'nome' => 'Falamansa',
                'gênero' => 'Forro'
            ],
            [
                'id' => 3,
                'nome' => 'Exaltassamba',
                'gênero' => 'Pagode'
            ],
            [
                'id' => 4,
                'nome' => 'Charlie Brown Jr',
                'gênero' => 'Rock'
            ],
            [
                'id' => 5,
                'nome' => 'U2',
                'gênero' => 'Rock'
            ],

        ];

    }


}

