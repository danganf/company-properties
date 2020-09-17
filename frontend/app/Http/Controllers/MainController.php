<?php

namespace App\Http\Controllers;

use App\MyClass\FactoryApis;

class MainController extends Controller
{
    public function __construct()
    {

    }

    public function index(){    
        return view('pages.index');
    }
    
    public function admin(){
        return view('pages.admin');
    }
    
    public function new(){
        return view('pages.form-number');
    }
    
    public function edit($id, FactoryApis $factoryApis){
        $result = $factoryApis->get('properties/'.$id);
        if( !empty( $result ) ){
            return view('pages.form-number', $result);
        } else {
            return redirect()->route('admin');
        }
    }
}