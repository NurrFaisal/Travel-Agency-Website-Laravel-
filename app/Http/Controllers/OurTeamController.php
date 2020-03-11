<?php

namespace App\Http\Controllers;

use App\Models\OurTeamBanner;
use App\Models\OurTeamStaff;
use Illuminate\Http\Request;
use Image;

class OurTeamController extends Controller
{
    public function ourTeamBanner(){
        $our_team_banner = OurTeamBanner::where('id', 1)->first();
        return view('backEnd.our-team.our-team-banner.our-team-banner', [
            'our_team_banner' => $our_team_banner
        ]);
    }

    public function updateOurTeamBanner(Request $request){
        $our_team_banner = OurTeamBanner::where('id', 1)->first();
        if($request->our_team_banner){
            $request->validate([
                'our_team_banner' => 'required | image'
            ]);
            if(file_exists($our_team_banner->our_team_banner)){
                unlink($our_team_banner->our_team_banner);
            }
            $image = $request->file('our_team_banner');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image_url = 'cosmos/custom_image/our-team/';
            Image::make($image)->resize(1350, 400)->save($image_url.$image_name);
            $our_team_banner->our_team_banner = $image_url.$image_name;
            $our_team_banner->update();
        }

        session()->flash('type', 'success');
        session()->flash('message', 'Our Team Banner Image Updated Successfully !!!');
        return back();
    }

    public function ourTeamStaff(){
        $our_team_staffs = OurTeamStaff::orderBY('name', 'asc')->paginate(10);
        return view('backEnd.our-team.our-team-stuff.our_team_stuff',[
            'our_team_staffs' => $our_team_staffs
        ]);
    }

    protected function staffValidation($request){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'branch' => 'required',
            'status' => 'required',
        ]);
    }

    protected function saveStaffImage($our_team_staff, $request){
        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url  = 'cosmos/custom_image/our-team/';
        Image::make($image)->resize(106, 114)->save($image_url.$image_name);
        $our_team_staff->image = $image_url.$image_name;
    }

    protected function saveBasicInfo($our_team_staff, $request){
        $our_team_staff->name = $request->name;
        $our_team_staff->designation = $request->designation;
        $our_team_staff->phone_number = $request->phone_number;
        $our_team_staff->email = $request->email;
        $our_team_staff->branch = $request->branch;
        $our_team_staff->status = $request->status;
    }

    public function addStaff(Request $request){
        $this->staffValidation($request);
        $request->validate([
            'image' => 'required'
        ]);
        $our_team_staff = new OurTeamStaff();
        $this->saveStaffImage($our_team_staff, $request);
        $this->saveBasicInfo($our_team_staff, $request);
        $our_team_staff->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Staff Added Successfully !!!');
        return back();
    }
    public function updateOurTeamStaff(Request $request){
        $this->staffValidation($request);
        $our_team_staff = OurTeamStaff::where('id', $request->id)->first();
        if($request->image){
            $request->validate([
                'image' => 'required | image'
            ]);
            if(file_exists($our_team_staff->image)){
                unlink($our_team_staff->image);
            }
            $this->saveStaffImage($our_team_staff, $request);
        }
        $this->saveBasicInfo($our_team_staff, $request);
        $our_team_staff->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Staff Updated Successfully !!!');
        return back();
    }

    public function deleteOurTeamStaff($id){
        $our_team_staff = OurTeamStaff::where('id', $id)->first();
        if(file_exists($our_team_staff->image)){
            unlink($our_team_staff->image);
        }
        $our_team_staff->delete();
        session()->flash('type', 'success');
        session()->flash('message', 'Our Team Staff Deleted Successfully !!!');
        return back();
    }
}
