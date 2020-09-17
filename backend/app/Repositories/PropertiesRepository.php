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

    public function createOrUpdate(JsonAbstract $json, $id=null)
    {        
        if( !empty( $id ) ){
            $this->find($id);
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
