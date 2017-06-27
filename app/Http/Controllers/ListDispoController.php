<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Dispo;

class listDispoController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function getDispos(Request $request){
        $dispos = Dispo::All();
        return view('user', ['dispos'=>$dispos]);
    }
}
?>
