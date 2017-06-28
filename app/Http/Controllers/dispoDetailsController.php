<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dispo;

class dispoDetailsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function getDetails(Request $request, $id)
    {
        $dispo = Dispo::All()->where('id', '=', $id)->first();
        return view('dispoDetails', ['dispo'=>$dispo]);
    }
}
