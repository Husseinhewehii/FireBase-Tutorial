<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use File;
use Kreait\Firebase\ServiceAccount;

class FireBaseController extends Controller
{


    public function index(){
        $fireBaseKeyFile = File::get(base_path('app/Http/Controllers/FireBaseKey.json'));
        $firebase = (new Factory)
            ->withServiceAccount($fireBaseKeyFile)
            ->withDatabaseUri('https://laravel-tutorial-3f93d-default-rtdb.firebaseio.com/');

        $database = $firebase->createDatabase();
        $newPost = $database->getReference('classes/science ')->push([
                'title' => 'Laravel FireBase Tutorial' ,
                'category' => 'Laravel'
            ]);

    }

}
