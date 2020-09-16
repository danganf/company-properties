<?php

namespace App\Repositories;

use Carbon\Carbon;
use DanganfTools\MyClass\Json\Contracts\JsonAbstract;
use DanganfTools\MyClass\MyCript;
use DanganfTools\Repositories\Contracts\RepositoryAbstract;

class UserRepository extends RepositoryAbstract
{
    private $myCript;

    public function __construct(MyCript $myCript)
    {    
        parent::__construct( __CLASS__ );
        $this->myCript = $myCript;
    }

    /**
     * VERIFICA A EXISTENCIA DE UM USUARIO COM BASE EM LOGIN E SENHA
     * @param $login
     * @param $pass
     * @return bool
     */
    public function auth( $login, $pass ){
        $return = $this->getModel()->selectRaw('id, name, email')->where('email', $login)->where('password', md5( $pass ) )->first();
        if( !empty( $return ) ){
            $return = $return->toArray();
            $return['token'] = $this->myCript->encode(config('app.key_crypt'), [
                'id' => $return['id'],
                'nane' => get_first_name($return['name']),
                'time'=> Carbon::now()->toDateTimeString()
            ]);
        }
        return $return;
    }

    public function createOrUpdate(JsonAbstract $jsonValues, $id=null)
    {
        //
    }
}
