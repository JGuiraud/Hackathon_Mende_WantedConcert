<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dispo;

class listDispoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function getDispos(Request $request)
    {
        $dispos = Dispo::All();
        $cities = [];
        foreach ($dispos as $dispo) {
            if (!in_array(strtolower($dispo->ville), $cities)) {
                $cities[] = strtolower($dispo->ville);
            }
        }
        return view('user', ['dispos'=>$dispos, 'cities'=>$cities]);
    }

    public function getDisposByCity(Request $request, $city)
    {
        $dispos = Dispo::All();
        $cities = [];
        foreach ($dispos as $dispo) {
            if (!in_array(strtolower($dispo->ville), $cities)) {
                $cities[] = strtolower($dispo->ville);
            }
        }
        $dispos = Dispo::All()->where('ville', '=', $city);
        return view('user', ['dispos'=>$dispos, 'cities'=>$cities]);
    }
}
