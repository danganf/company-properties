<?php

namespace App\Repositories;

use DanganfTools\MyClass\Json\Contracts\JsonAbstract;
use DanganfTools\Repositories\Contracts\RepositoryAbstract;

class PropertiesRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct( __CLASS__ );
    }

    public function last(){        
        $return = $this->getModel()->selectRaw('title, total')->orderByRaw('id desc')->limit(1)->get()->toArray();
        return $return ? current( $return ) : [];
    }
    
    public function list(){
        return $this->getModel()->selectRaw('id, title, total, created_at')->orderByRaw('id desc')->get()->toArray();
    }

    public function createOrUpdate(JsonAbstract $json, $id=null)
    {        
        if( !empty( $id ) ){
            $this->find((int)$id);
            if($this->fails()){
                $this->setMsgError( \Lang::get('default.register_not_exist') );
                return false;
            }        
        }
        
        $this->set('title', $json->get('title'));
        $this->set('total', $json->get('total'));

        try{
            $this->save();              
            return $this->toArray();
        } catch ( \Exception $e ){
            $this->setMsgError( $e->getMessage() );
        }

        return false;

    }
}
