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

    public function patchUpdate( JsonAbstract $json, $id=null ){

        $this->find($id);
        if($this->fails()){
            $this->setMsgError( \Lang::get('default.register_not_exist') );
            return false;
        }

        try{
            foreach($json->toArray() as $key => $value){
                $this->set( $key, $value);
            }
            $this->save();
        } catch ( \Exception $e ){
            $this->setMsgError( $e->getMessage() );
        }

        $this->save();

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

        $where = "code='{$json->get('code')}'";
        $where .= empty( $id ) ? '' : " and id!='$id'";

        //VERIFY UNIQUE KEY CODE EXIST
        if( empty( $this->setWhere($where)->setFields('id')->first() ) ){
        
            $this->set('code', $json->get('code'));
            $this->set('title', $json->get('title'));
            $this->set('price', $json->get('price'));
            $this->set('action', $json->get('action'));

            try{
                $this->save();              
                return [
                    'id' => $this->getModel()->id,
                    'code' => $this->getModel()->code,
                    'created_at' => $this->getModel()->created_at,
                ];
    
            } catch ( \Exception $e ){
                $this->setMsgError( $e->getMessage() );
            }            

        } else {
            $this->setMsgError( \Lang::get('default.code_found') );
        }

        return false;

    }    
}
