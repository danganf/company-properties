<?php

namespace App\MyClass\Traits;

trait OpenViewController
{
    protected function openView( $dados = [], $view = 'index' ){

        $textSubtitle = '';
        if( !is_array( $this->subtitle ) ){

            if( empty( $this->subtitle ) ){
                $this->subtitle = $this->title;
            }
            $textSubtitle   = $this->subtitle;
            $this->subtitle = [$this->subtitle];
        }

        $routeName = getRouteName();

        $dados['viewData'] = [
            'title'      => $this->title,
            'subtitle'   => last($this->subtitle),
            'actionName' => camel_case(current(explode('.', $routeName))),
            'routeName'  => camel_case(last(explode('.', $routeName)))
        ];

        if( array_has( $dados, 'filters' ) ){
            array_pull( $dados, 'filters.company_uid' );
        }

        $dados['basicPath'] = "pages.".$this->pathView;
        //dd($dados);
        return view($dados['basicPath'].'.'.$view, $dados);

    }
}