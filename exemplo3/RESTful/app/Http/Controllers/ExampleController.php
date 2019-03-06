<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pessoas extends Model{
    
}

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
}