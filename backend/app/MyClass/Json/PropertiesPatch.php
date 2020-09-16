<?php

namespace App\MyClass\Json;

use App\Models\Properties;
use DanganfTools\MyClass\Json\Contracts\JsonAbstract;
use DanganfTools\MyClass\Json\Contracts\JsonInterface;
use DanganfTools\MyClass\Validator;

class PropertiesPatch extends JsonAbstract implements JsonInterface
{
    private $validator, $status;

    public function __construct(Validator $validator, Properties $properties)
    {
        $this->validator = $validator;
        $this->status = implode(',',array_keys($properties::STATUS));
    }

    public function set( $stringJson ) {
        $this->setReturnPadrao();
        $this->setJson( json_decode( $stringJson ) );
        $this->validRequiredFields($this->toArray());
        \Request::merge( [ 'json' => $this ] );
        $this->validator = null;
    }

    public function validRequiredFields( $array ) {
        $this->trataDados();
        $array  = $this->toArray();
        $fields = [];
        
        if( array_get( $array, 'action' ) ){
            $fields[] = 'action';
            $this->validator->setRule('action', 'required|in:'.$this->status);
        }

        if( empty( $fields ) ){
            $this->error( \Lang::get('default.parameters_incorrets') );
        }

        if ( !$this->validator->valid( $array, $fields ) ) {
            $this->error( $this->validator->error() );
        }

        return TRUE;
    }

    private function trataDados() {

    }
}
