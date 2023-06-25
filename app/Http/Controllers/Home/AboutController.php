<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Skills;
use App\Models\Award;
use App\Models\Education;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Image;
use File;
use Illuminate\Validation\Rules;


class AboutController extends Controller
{
    public function aboutPage(){

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));

    } // End Method

    public function updateAbout(Request $request){

        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $resume = $request->file('resume_link');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $file_name = hexdec(uniqid()).'.'.$resume->getClientOriginalExtension(); 

            Image::make($image)->resize(523,605)->save('upload/home_about/'.$name_gen);
            $destinationPath = public_path().'/upload/resume' ;
            $resume->move($destinationPath,$file_name);
            $save_url = 'upload/home_about/'.$name_gen;
            $resume_url = 'upload/resume/'.$file_name;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'resume_link' => $resume_url,
                'about_image' => $save_url,
                'updated_at' => Carbon::now(),

            ]); 
            $notification = array(
            'message' => 'About Page Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } else{
            $resume = $request->file('resume_link');
            $file_name = hexdec(uniqid()).'.'.$resume->getClientOriginalExtension();
            $destinationPath = public_path().'/upload/resume' ;
            $resume->move($destinationPath,$file_name);
            $resume_url = 'upload/resume/'.$file_name;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'resume_link' => $resume_url,
                'updated_at' => Carbon::now(),

            ]); 
            $notification = array(
            'message' => 'About Page Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end Else

    } // End Method

    public function homeAbout(){

        $aboutpage = About::find(1);
        $skillData = Skills::all();
        $awardData = Award::all();
        $educationData = Education::all();
        return view('frontend.about_page',compact('aboutpage', 'skillData','awardData', 'educationData'));

     }// End Method

    public function skillPage(){

        $skillpage = Skills::all();
        return view('admin.about_page.skill_all' ,compact('skillpage'));

    } // End Method

    public function addSkill(){

        return view('admin.about_page.add_skill');

    } // End Method

    public function StoreSkills(Request $request){

        Skills::insert([
            'skill' => $request->skill,
            'skill_range' => $request->skill_range,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Skill Added Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('skill.page')->with($notification);

    } // End Method

    public function editSkill($id){

        $skillpage = Skills::findOrFail($id);

        return view('admin.about_page.edit_skills',compact('skillpage'));

    } // End Method

    public function updateSkill(Request $request){

        $skill_id = $request->id;

        Skills::findOrFail($skill_id)->update([
            'skill' => $request->skill,
            'skill_range' => $request->skill_range,
            'updated_at' => Carbon::now()
        ]); 

        $notification = array(
            'message' => 'Skill Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('skill.page')->with($notification);
    }

    public function deleteSkill($id){

        $skill = Skills::findOrFail($id);

        Skills::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Skills Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('skill.page')->with($notification);       

    }// End Method 

    public function awardPage(){

        $award = Award::all();
        return view('admin.about_page.award_all', compact('award'));
    }

    public function insertAward(Request $request){

        return view('admin.about_page.add_award');
    }

    public function StoreAward(Request $request){

        if ($request->file('award_logo')) {

            $image = $request->file('award_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->save('upload/home_award/'.$name_gen);
            $save_url = 'upload/home_award/'.$name_gen;

            $award = Award::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'award_logo' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $award->save();

            $notification = array(
                'message' => 'Award Added with Logo Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('award.page')->with($notification);

        } else{

            $award = Award::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'created_at' => Carbon::now(),

            ]);

            $award->save();

            $notification = array(
                'message' => 'Award Added without Logo Successfully', 
                'alert-type' => 'success'
            );

        return redirect()->route('award.page')->with($notification);

        } // end Else
    }

    public function editAward($id){

        $awardData = Award::findOrFail($id);
        return view('admin.about_page.edit_award',compact('awardData'));

    } // End Method

    public function updateAward(Request $request){
        $award_id = $request->id;

        if ($request->file('award_logo')) {
            $image = $request->file('award_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->save('upload/home_award/'.$name_gen);
            $save_url = 'upload/home_award/'.$name_gen;

            Award::findOrFail($award_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'award_logo' => $save_url,
                'updated_at' => Carbon::now(),
            ]); 

            $notification = array(
                'message' => 'About Page Updated with Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('award.page')->with($notification);

        } else{

            Award::findOrFail($award_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'updated_at' => Carbon::now(),
            ]); 

            $notification = array(
                'message' => 'About Page Updated without Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('award.page')->with($notification);

        } // end Else
    }

    public function deleteAward($id){

        $award = Award::findOrFail($id);

        Award::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Award Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('award.page')->with($notification);       

    }// End Method 

    public function educationPage(){
        
        $education = Education::all();
        return view('admin.about_page.education_all', compact('education'));
    }

    public function insertEducation(){

        return view('admin.about_page.add_education');

    }

    public function StoreEducation(Request $request){

        $education = Education::create([
            'title' => $request->title,
            'year' => $request->year,
            'short_desc' => $request->short_description,
            'created_at' => Carbon::now(),
        ]);

        $education->save();

        $notification = array(
            'message' => 'Education Added Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('education.page')->with($notification);
    }

    public function editEducation($id){

        $education = Education::findOrFail($id);
        return view('admin.about_page.edit_education',compact('education'));
    }

    public function updateEducation(Request $request){

        $education_id = $request->id;

        Education::findOrFail($education_id)->update([
            'title' => $request->title,
            'year' => $request->year,
            'short_desc' => $request->short_description,
            'updated_at' => Carbon::now()
        ]); 

        $notification = array(
            'message' => 'Education Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('education.page')->with($notification);
    }

    public function deleteEducation($id){

        $education = Education::findOrFail($id);

        Education::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Education Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('education.page')->with($notification);       

    }// End Method 

    public function aboutMultiImage(){

        return view('admin.about_page.multimage');

    }// End Method 


    public function storeMultiImage(Request $request){

        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {

           $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::insert([

                'multi_image' => $save_url,
                'created_at' => Carbon::now()

            ]); 

        } // End of the froeach


        $notification = array(
            'message' => 'Multi Image Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notification);

    }// End Method 

    public function AllMultiImage(){

        $allMultiImage = MultiImage::all();

        return view('admin.about_page.all_multiimage',compact('allMultiImage'));

    }// End Method

    public function EditMultiImage($id){

        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));

    }// End Method 


    public function UpdateMultiImage(Request $request){

        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([

                'multi_image' => $save_url,
                'updated_at' =>Carbon::now()

            ]); 

            $notification = array(
                'message' => 'Multi Image Updated Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.multi.image')->with($notification);

        }

    }// End Method

    public function DeleteMultiImage($id){

        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Multi Image Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }// End Method
}
