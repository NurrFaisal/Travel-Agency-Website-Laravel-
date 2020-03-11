<?php

namespace App\Http\Controllers;

use App\Models\FooterPhoneNumber;
use Illuminate\Http\Request;

class FooterPhoneNumberController extends Controller
{
    public function footerPhoneNumber(){
        $footerPhoneNumber = FooterPhoneNumber::where('id', 1)->first();
        return view('backEnd.footerPhoneNumber.footer_phone_number', ['footerPhoneNumber' => $footerPhoneNumber]);
    }
    protected function footerPhoneNumberValidation($request){
        $request->validate([
            'package' => 'required',
            'package_banani' => 'required',
            'visa' => 'required',
            'visa_banani' => 'required',
            'air_ticket' => 'required',
            'air_ticket_banani' => 'required',
        ]);
    }
    public function updateFooterPhoneNumber(Request $request){
        $this->footerPhoneNumberValidation($request);
        $footerPhoneNumber = FooterPhoneNumber::where('id', 1)->first();
        $footerPhoneNumber->package = $request->package;
        $footerPhoneNumber->package_banani = $request->package_banani;
        $footerPhoneNumber->visa = $request->visa;
        $footerPhoneNumber->visa_banani = $request->visa_banani;
        $footerPhoneNumber->air_ticket = $request->air_ticket;
        $footerPhoneNumber->air_ticket_banani = $request->air_ticket_banani;
        $footerPhoneNumber->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Phone Number Updated Successfully !!!');
        return back();
    }
}
