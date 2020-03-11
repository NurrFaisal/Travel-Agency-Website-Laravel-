<?php

namespace App\Http\Controllers;

use App\Models\Ifram;
use Illuminate\Http\Request;

class IframController extends Controller
{
    public function ifram(){
        $ifram = Ifram::where('id', 1)->first();
        return view('backEnd.footerIfram.footer_ifram', ['ifram' => $ifram]);
    }
    protected function iframValidation($request){
        $request->validate([
            'facebook' => 'required',
            'youtube' => 'required',
        ]);
    }
    public function updateIfram(Request $request){
        $this->iframValidation($request);
        $ifram = Ifram::where('id', 1)->first();
        $ifram->facebook = $request->facebook;
        $ifram->youtube = $request->youtube;
        $ifram->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Ifram Updated Successfully !!!');
        return back();
    }
}
