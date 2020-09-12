<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Danganf\MyClass\LogDebug;
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
}
