<?php

namespace App\Http\Controllers;

use App\Repositories\PropertiesRepository;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function list(PropertiesRepository $propertiesRepository ){
        return msgJson( 
            $propertiesRepository->setFields('id, title, total, created_at')->search() 
        );
    }
    
    public function create( $id=null, Request $request, PropertiesRepository $propertiesRepository ){
        $propertiesRepository->createOrUpdate( $request->get('json'), $id );
        if( !$propertiesRepository->getMsgError() ){
            return msgSuccessJson('OK');
        }
        return msgErroJson($propertiesRepository->getMsgError());
    }

    public function delete( $id, PropertiesRepository $propertiesRepository ){
        $result = $propertiesRepository->delete($id);
        if( $result ){
            return msgSuccessJson('OK');
        }
        return msgErroJson(\Lang::get('default.action_error'));
    }
}
