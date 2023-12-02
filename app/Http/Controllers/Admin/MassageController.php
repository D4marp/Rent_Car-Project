<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Massage;


class MassageController extends Controller
{
public function index(){
     $massages = Massage::latest()->get();

     return view('admin.massages.index', compact('massages'));
}

public function destroy(Massage $massage){
     $massage->delete();

 return redirect()->back()->with([
     'massage' => 'data berhasil dihapus',
     'alert-type' => 'danger',
 ]);
}

}
