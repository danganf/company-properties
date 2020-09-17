<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $pdvApi;

    public function __construct()
    {

    }

    public function main()
    {
        return msgJson([
            'name' => config('app.name'),
            'description' => 'project test',
            'version' => config('app.version'),
        ]);
    }

    public function auth( Request $request, UserRepository $userRepository ){

        $result = $userRepository->auth( $request->get('json')->get('login'), $request->get('json')->get('password') );
        if( !empty( $result ) ){
            return msgJson( $result );
        }
        return msgErroJson( \Lang::get('auth.failed'), 401 );

    }

    public function feed(){
        $data = [];
        try {                 
            $xml = simplexml_load_string( file_get_contents('http://www.investimentosenoticias.com.br/noticias?format=feed') );            
            $tt = count($xml->channel->item);
            $idx = rand(1, $tt-1);
            $data = [
                'title' => (string)$xml->channel->item[$idx]->title,                
                'author' => (string)$xml->channel->item[$idx]->author,
                'pubDate' => (string)$xml->channel->item[$idx]->pubDate,
                'description' => (string)$xml->channel->item[$idx]->description,
            ];            
        }catch(\Exception $e){

        }
        return msgJson($data);
    }
}
