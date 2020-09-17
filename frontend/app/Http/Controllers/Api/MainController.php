<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\MyClass\FactoryApis;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $pdvApi;

    public function __construct()
    {

    }

    public function auth( Request $request, FactoryApis $factoryApis ){

        $factoryApis->setRequest($request)->setContentType('json');

        $result = $factoryApis->post('auth');
        if( !empty( $result ) ){            
            $request->session()->put( 'token', array_pull( $result, 'token' ) );
            $request->session()->put( 'userData', $result );            
            return msgJson( $result );
        }
        return msgErroJson( \Lang::get('auth.failed'), 401 );

    }

    public function logoff(Request $request){
        $request->session()->flush();
        return redirect()->route('auth.index');
    }
}
