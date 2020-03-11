<?php

namespace App\Http\Controllers;

use App\Model\NewGelleryImage;
use App\Models\Gellery;
use App\Models\GelleryMainCategory;
use App\Models\GellerySubCategory;
use App\Models\OurTeamStaff;
use App\Models\Year;
use Illuminate\Http\Request;
use Image;

class GelleryController extends Controller
{
    public function gellery(){
        $gellery_images = Gellery::orderBy('id', 'desc')->get();
        return view('backEnd.gellery.gellery', [
            'gellery_images' => $gellery_images
        ]);
    }


    // BackEnd Start

    public function addGellery(Request $request){
        $request->validate([
            'gellery_image' => 'required'
        ]);
        $image_arry = [];
        $image_arry = $request->gellery_image;
        $image_arry_len = count($image_arry);
        for($i = 0; $i < $image_arry_len; $i++){
            $image = $image_arry[$i];
            $image_name = time().'_'.$image->getClientOriginalName();
            $image_url_box = 'cosmos/custom_image/gellery/box/';
            $image_url_gellery = 'cosmos/custom_image/gellery/gellery/';
            Image::make($image)->resize(259, 200)->save($image_url_box.$image_name);
            Image::make($image)->resize(867, 650)->save($image_url_gellery.$image_name);
            $gellery_image = new Gellery();
            $gellery_image->box_image = $image_url_box.$image_name;
            $gellery_image->gellery_image = $image_url_gellery.$image_name;
            $gellery_image->save();
        }
        session()->flash('type', 'success');
        session()->flash('message', 'Gellery Image Added Successfully !!!');
        return back();
    }

    public function deleteGelleryImage($id){
       $gellery_image = Gellery::where('id', $id)->first();
       if(file_exists($gellery_image->gellery_image)){
           unlink($gellery_image->gellery_image);
       }
       if (file_exists($gellery_image->box_image)){
           unlink($gellery_image->box_image);
       }
       $gellery_image->delete();
       session()->flash('type', 'danger');
       session()->flash('message', 'Image Deleted Sucessfully !!!');
       return back();
    }

    // BackEnd End


    //new Gellery Fuctional After This line


    public function mainCategory(){
        $gellery_main_categories = GelleryMainCategory::orderBy('id', 'desc')->paginate(10);
        return view('backEnd.new-gellery.main-category.gellery-main-category', [
            'gellery_main_categories' =>$gellery_main_categories
        ]);
    }
    protected function mainCategoryValidation($request){
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
    }

    protected function mbox_image($gellery_main_category, $request){
        $box_image = $request->file('box_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/new-gellery/main-category/';
        Image::make($box_image)->resize(253, 144)->save($box_image_url.$box_image_name);
        $gellery_main_category->box_image = $box_image_url.$box_image_name;
    }

    protected function mbackground_image($gellery_main_category, $request){
        $box_image = $request->file('background_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/new-gellery/main-category/';
        Image::make($box_image)->resize(1450, 700)->save($box_image_url.$box_image_name);
        $gellery_main_category->background_image = $box_image_url.$box_image_name;
    }

    public function addMainCategory(Request $request){
        $this->mainCategoryValidation($request);
        $request->validate([
            'box_image' => 'required | image',
        ]);
        $gellery_main_category = new GelleryMainCategory();
        $this->mbox_image($gellery_main_category, $request);
//        $this->mbackground_image($gellery_main_category, $request);
        $gellery_main_category->name = $request->name;
        $gellery_main_category->slug = strtolower($request->name);
        $gellery_main_category->status = $request->status;
        $gellery_main_category->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Gallery Main Category Added Successfully !!!');
        return back();
    }

    protected function updateMianCategory(Request $request){
        $this->mainCategoryValidation($request);
//        return $request;
        $request->validate([
            'id' => 'required'
        ]);
        $gellery_main_category = GelleryMainCategory::where('id', $request->id)->first();
        if ($request->box_image){
            $request->validate([
                'box_image' => 'required | image'
            ]);
            unlink($gellery_main_category->box_image);
            $this->mbox_image($gellery_main_category, $request);
        }
        if ($request->background_image){
            $request->validate([
                'background_image' => 'required | image'
            ]);
            unlink($gellery_main_category->background_image);
            $this->mbackground_image($gellery_main_category, $request);
        }
        $gellery_main_category->name = $request->name;
        $gellery_main_category->slug = strtolower($request->name);
        $gellery_main_category->status = $request->status;
        $gellery_main_category->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Gallery Main Category Updated Successfully !!!');
        return back();
    }

    public function deleteMainCategory($id){
        $gellery_main_category = GelleryMainCategory::where('id', $id)->first();
        unlink($gellery_main_category->box_image);
//        unlink($gellery_main_category->background_image);
        $gellery_main_category->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Gellery Main Cagtegory Deleted Successfully !!!');
        return back();
    }

    // Sub Category Start

    public function subCategory(){
        $gellery_main_categories = GelleryMainCategory::where('status', 1)->get();
        $gellery_sub_categories = GellerySubCategory::with(['mainCategory' => function($q){$q->select('id', 'name');}])->orderBy('id', 'desc')->paginate(10);
        return view('backEnd.new-gellery.sub-category.gellery_sub_category', [
            'gellery_main_categories' => $gellery_main_categories,
            'gellery_sub_categories' => $gellery_sub_categories
        ]);
    }

    protected function subCategoryValidation($request){
        $request->validate([
            'gellery_main_category_id' => 'required',
            'name' => 'required',
            'status' => 'required'
        ]);
    }
    protected function sbox_image($gellery_sub_category, $request){
        $box_image = $request->file('box_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/new-gellery/sub-category/';
        Image::make($box_image)->resize(253, 144)->save($box_image_url.$box_image_name);
        $gellery_sub_category->box_image = $box_image_url.$box_image_name;
    }
    protected function sbackground_image($gellery_sub_category, $request){
        $box_image = $request->file('background_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/new-gellery/sub-category/';
        Image::make($box_image)->resize(1450, 700)->save($box_image_url.$box_image_name);
        $gellery_sub_category->background_image = $box_image_url.$box_image_name;
    }
    public function addSubCategory(Request $request){
        $this->subCategoryValidation($request);
        $request->validate([
            'box_image' => 'required | image',
        ]);
        $gellery_sub_category = new GellerySubCategory();
        $this->sbox_image($gellery_sub_category, $request);
//        $this->sbackground_image($gellery_sub_category, $request);
        $gellery_sub_category->name = $request->name;
        $gellery_sub_category->slug = strtolower($request->name);
        $gellery_sub_category->status = $request->status;
        $gellery_sub_category->gellery_main_category_id = $request->gellery_main_category_id;
        $gellery_sub_category->save();
        session()->flash('type', 'success');
        session()->flash('message', 'Gallery Sub Category Added Successfully !!!');
        return back();
    }

    public function updateSubCategory(Request $request){
        $this->subCategoryValidation($request);
        $gellery_sub_category = GellerySubCategory::where('id', $request->id)->first();
        if ($request->box_image){
            $request->validate([
                'box_image' => 'required | image',
            ]);
            unlink($gellery_sub_category->box_image);
            $this->sbox_image($gellery_sub_category, $request);
        }
        if($request->background_image){
            $request->validate([
                'background_image' => 'required | image'
            ]);
            unlink($gellery_sub_category->background_image);
            $this->sbackground_image($gellery_sub_category, $request);
        }
        $gellery_sub_category->name = $request->name;
        $gellery_sub_category->slug = strtolower($request->name);
        $gellery_sub_category->status = $request->status;
        $gellery_sub_category->gellery_main_category_id = $request->gellery_main_category_id;
        $gellery_sub_category->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Sub Category Updated Successfully !!!');
        return back();
    }

    public function deleteSubCategory($id){
        $gellery_sub_category = GellerySubCategory::where('id', $id)->first();
        unlink($gellery_sub_category->box_image);
//        unlink($gellery_sub_category->background_image);
        $gellery_sub_category->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Sub Category Deleted Successfully !!!');
        return back();
    }

    // Sub Category End

    // year start

    public function year(){
        $years = Year::orderBy('id', 'desc')->paginate(10);
        return view('backEnd.new-gellery.year.year', ['years' => $years]);
    }

    protected function ybox_image($year, $request){
        $box_image = $request->file('box_image');
        $box_image_name = time().'_'.$box_image->getClientOriginalName();
        $box_image_url = 'cosmos/custom_image/new-gellery/year/';
        Image::make($box_image)->resize(253, 144)->save($box_image_url.$box_image_name);
        $year->box_image = $box_image_url.$box_image_name;
    }

    public function addYear(Request $request){
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'box_image' => 'required|image'
        ]);
        $year = new Year();
        $this->ybox_image($year, $request);
        $year->name = $request->name;
        $year->status = $request->status;
        $year->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Year Added Successfully !!!');
        return back();
    }

    public function updateYear(Request $request){

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $year = Year::where('id', $request->id)->first();
        $box_image = $request->file('box_image');
        if($box_image != null){
            $request->validate([
                'box_image' => 'required|image'
            ]);
            unlink($year->box_image);
            $this->ybox_image($year,$request);
        }
        $year->name = $request->name;
        $year->status = $request->status;
        $year->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Year Updated Successfully !!!');
        return back();
    }

    public function deleteYear($id){
        $year = Year::where('id', $id)->first();
        unlink($year->box_image);
        $year->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Year Deleted Successfully !!!');
        return back();
    }

    public function galleryImage(){
        $gallery_main_categories = GelleryMainCategory::where('status', 1)->get();
        $years = Year::where('status', 1)->get();
        $our_team_staffs = OurTeamStaff::where('status', 1)->get();
        $new_gallery_images = NewGelleryImage::with(['main_category' => function($q){$q->select('id', 'name');}, 'person' => function($q){$q->select('id', 'name');}])->orderBy('id', 'desc')->paginate(10);
//        return $new_gallery_images;
        return view('backEnd.new-gellery.gallery-image.gallery', [
            'gallery_main_categories' => $gallery_main_categories,
            'years' => $years,
            'our_team_staffs' => $our_team_staffs,
            'new_gallery_images' => $new_gallery_images
            ]);
    }

    public function gellerySubCategory(Request $request){
        $gellery_sub_category = GellerySubCategory::where('gellery_main_category_id', $request->id)->get();
        return response()->json($gellery_sub_category);
    }
    protected function galleryImageValidation($request){
        $request->validate([
            'year_id' => 'required',
            'gellery_main_category_id' => 'required',
            'sub_category_id' => 'required',
            'box_image' => 'required',
        ]);
    }

    public function addGalleryImage(Request $request){
        $this->galleryImageValidation($request);
        $image_array = [];
        $image_array = $request->file('box_image');
        $image_len = count($image_array);
        for ($i = 0; $i < $image_len; $i++){
            $image = $image_array[$i];
            $image_name = time().'_'.$image->getClientOriginalName();
            $image_url_box = 'cosmos/custom_image/new-gellery/gallery-image/';
            $image_url_gellery = 'cosmos/custom_image/new-gellery/gallery-image/full/';
            Image::make($image)->resize(259, 200)->save($image_url_box.$image_name);
            Image::make($image)->resize(867, 650)->save($image_url_gellery.$image_name);

            $new_gallery_image = new NewGelleryImage();
            $new_gallery_image->year_id = $request->year_id;
            $new_gallery_image->gellery_main_category_id = $request->gellery_main_category_id;
            $new_gallery_image->sub_category_id = $request->sub_category_id;
            $new_gallery_image->sub_category_id = $request->sub_category_id;
            $new_gallery_image->person_id = $request->person_id;
            $new_gallery_image->box_image = $image_url_box.$image_name;
            $new_gallery_image->full_image = $image_url_gellery.$image_name;
            $new_gallery_image->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Gallery Image Uploaded Successfully !!!');
        }
        return back();
    }

    public function deleteGalleryImage($id){
        $new_gallery_image = NewGelleryImage::where('id', $id)->first();
        unlink($new_gallery_image->box_image);
        unlink($new_gallery_image->full_image);
        $new_gallery_image->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Gallery Image Deleted Successfully !!!');
        return back();
    }

}
