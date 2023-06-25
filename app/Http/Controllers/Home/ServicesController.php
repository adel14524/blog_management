<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Image;
use Illuminate\Support\Carbon;

class ServicesController extends Controller
{
    public function allServices(){

        $services = Services::latest()->get();
        return view('admin.admin_services.services_all',compact('services'));

    } // End Method

    public function addServices() {
        return view('admin.admin_services.services_add');
    }

    public function storeServices(Request $request) {

        $image = $request->file('services_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        $logo = $request->file('services_logo');
        $name_logo = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();  // 3434343443.jpg

        $image1 = $request->file('image1');
        $name_gen1 = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();  // 3434343443.jpg

        $image2 = $request->file('image2');
        $name_gen2 = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->save('upload/services/'.$name_gen);
        $save_url = 'upload/services/'.$name_gen;

        Image::make($logo)->save('upload/services-logo/'.$name_logo);
        $save_logo = 'upload/services-logo/'.$name_logo;

        Image::make($image1)->save('upload/services-image/'.$name_gen1);
        $save_img = 'upload/services-image/'.$name_gen1;

        Image::make($image2)->save('upload/services-image/'.$name_gen2);
        $save_img2 = 'upload/services-image/'.$name_gen2;

        Services::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'services_logo' => $save_logo,
            'long_description' => $request->long_description,
            'services_image' => $save_url,
            'image1' => $save_img,
            'image2' => $save_img2,
            'created_at' => Carbon::now(),

        ]); 
        
        $notification = array(
            'message' => 'Services Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.services')->with($notification);
    }

    public function editServices($id) {

        $services = Services::findOrFail($id);
        return view('admin.admin_services.services_edit', compact('services'));
    }

    public function updateServices(Request $request) {

        $services_id = $request->id;

        if ($request->file('services_image')) {

            $image = $request->file('services_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->save('upload/services/'.$name_gen);
            $save_url = 'upload/services/'.$name_gen;

            Services::findOrFail($services_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'services_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]); 

            $notification = array(
                'message' => 'Services Updated with Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        }
        else if ($request->file('services_logo')){

            $logo = $request->file('services_logo');
            $name_logo = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($logo)->save('upload/services-logo/'.$name_logo);
            $save_logo = 'upload/services-logo/'.$name_logo;

            Services::findOrFail($services_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'services_logo' => $save_logo,
                'long_description' => $request->long_description,
                'updated_at' => Carbon::now(),
            ]); 

            $notification = array(
                'message' => 'Services Updated with Logo Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        }
        else if ($request->file('image1')){

            $image1 = $request->file('image1');
            $name_gen1 = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image1)->save('upload/services-image/'.$name_gen1);
            $save_img = 'upload/services-image/'.$name_gen1;

            Services::findOrFail($services_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image1' => $save_img,
                'updated_at' => Carbon::now(),
            ]); 

            $notification = array(
                'message' => 'Services Updated with Detail Image 1 Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        }
        else if ($request->file('image2')) {
            $image2 = $request->file('image2');
            $name_gen2 = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image2)->save('upload/services-image/'.$name_gen2);
            $save_img2 = 'upload/services-image/'.$name_gen2;

            Services::findOrFail($services_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image2' => $save_img2,
                'updated_at' => Carbon::now(),
            ]); 

            $notification = array(
                'message' => 'Services Updated with Detail Image 2 Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        }
        else{
            Services::findOrFail($services_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'updated_at' => Carbon::now(),
            ]); 

            $notification = array(
                'message' => 'Services Updated without Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        }
    }

    public function deleteServices($id){

        $services = Services::findOrFail($id);
        $logo = $services->services_logo;
        unlink($logo);
        $img = $services->services_image;
        unlink($img);
        $img1 = $services->image1;
        unlink($img1);
        $img2 = $services->image2;
        unlink($img2);
 
        Services::findOrFail($id)->delete();
 
         $notification = array(
            'message' => 'Services Deleted Successfully', 
            'alert-type' => 'success'
        );
 
        return redirect()->back()->with($notification);       
 
    }// End Method

    public function servicesDetails($id){

        $services = Services::findOrFail($id);

        return view('frontend.services_details',compact('services'));

    } // End Method


    public function homeServices() {
        $allservices = Services::latest()->paginate(3);

        return view('frontend.services',compact('allservices'));
    }


}
