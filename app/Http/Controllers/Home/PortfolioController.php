<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function allPortfolio(){

        $portfolio = Portfolio::latest()->get();

        return view('admin.portfolio.portfolio_all',compact('portfolio'));

    } // End Method

    public function AddPortfolio(){

        return view('admin.portfolio.portfolio_add');

    } // End Method


    public function StorePortfolio(Request $request){

        $image = $request->file('portfolio_image');
        $project_image1 = $request->file('project_image1');
        $project_image2 = $request->file('project_image2');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
        $name_gen_image1 = hexdec(uniqid()).'.'.$project_image1->getClientOriginalExtension();  // 3434343443.jpg
        $name_gen_image2 = hexdec(uniqid()).'.'.$project_image2->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->save('upload/portfolio/'.$name_gen);
        $save_url = 'upload/portfolio/'.$name_gen;

        Image::make($project_image1)->save('upload/portfolio/'.$name_gen_image1);
        $save_url_image1 = 'upload/portfolio/'.$name_gen_image1;

        Image::make($project_image2)->save('upload/portfolio/'.$name_gen_image2);
        $save_url_image2 = 'upload/portfolio/'.$name_gen_image2;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now(),
            'project_date' => $request->project_date,
            'project_location' => $request->project_location,
            'project_client' => $request->project_client,
            'project_link' => $request->project_link,
            'project_image1' => $save_url_image1,
            'project_image2' => $save_url_image2,
            'contact_address' => $request->contact_address,
            'contact_mail' => $request->contact_mail,
            'contact_phone' => $request->contact_phone,
            'contact_github' => $request->contact_github,
            'contact_website' => $request->contact_website
        ]); 
        $notification = array(
            'message' => 'Portfolio Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);

    }// End Method

    public function EditPortfolio($id){

        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.portfolio_edit',compact('portfolio'));

    }// End Method
    
    public function UpdatePortfolio(Request $request){

        $portfolio_id = $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $project_image1 = $request->file('project_image1');
            $project_image2 = $request->file('project_image2');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $name_gen_image1 = hexdec(uniqid()).'.'.$project_image1->getClientOriginalExtension();  // 3434343443.jpg
            $name_gen_image2 = hexdec(uniqid()).'.'.$project_image2->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen;

            Image::make($project_image1)->save('upload/portfolio/'.$name_gen_image1);
            $save_url_image1 = 'upload/portfolio/'.$name_gen_image1;

            Image::make($project_image2)->save('upload/portfolio/'.$name_gen_image2);
            $save_url_image2 = 'upload/portfolio/'.$name_gen_image2;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
                'project_date' => $request->project_date,
                'project_location' => $request->project_location,
                'project_client' => $request->project_client,
                'project_link' => $request->project_link,
                'project_image1' => $save_url_image1,
                'project_image2' => $save_url_image2,
                'contact_address' => $request->contact_address,
                'contact_mail' => $request->contact_mail,
                'contact_phone' => $request->contact_phone,
                'contact_github' => $request->contact_github,
                'contact_website' => $request->contact_website,
                'updated_at' => Carbon::now()

            ]); 

            $notification = array(
                'message' => 'Portfolio Updated with Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);

        } else{

            $project_image1 = $request->file('project_image1');
            $project_image2 = $request->file('project_image2');
            $name_gen_image1 = hexdec(uniqid()).'.'.$project_image1->getClientOriginalExtension();  // 3434343443.jpg
            $name_gen_image2 = hexdec(uniqid()).'.'.$project_image2->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($project_image1)->save('upload/portfolio/'.$name_gen_image1);
            $save_url_image1 = 'upload/portfolio/'.$name_gen_image1;

            Image::make($project_image2)->save('upload/portfolio/'.$name_gen_image2);
            $save_url_image2 = 'upload/portfolio/'.$name_gen_image2;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'project_date' => $request->project_date,
                'project_location' => $request->project_location,
                'project_client' => $request->project_client,
                'project_link' => $request->project_link,
                'project_image1' => $save_url_image1,
                'project_image2' => $save_url_image2,
                'contact_address' => $request->contact_address,
                'contact_mail' => $request->contact_mail,
                'contact_phone' => $request->contact_phone,
                'contact_github' => $request->contact_github,
                'contact_website' => $request->contact_website,
                'updated_at' => Carbon::now()
            ]); 

            $notification = array(
                'message' => 'Portfolio Updated without Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);

        } // end Else

    } // End Method

    public function DeletePortfolio($id){

        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Portfolio Image Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);       

    }// End Method 

    public function PortfolioDetails($id){

        $portfolio = Portfolio::findOrFail($id);

        return view('frontend.home_all.portfolio_details',compact('portfolio'));

    }// End Method

    public function HomePortfolio(){

        $portfolio = Portfolio::latest()->paginate(3);
        
        return view('frontend.portfolio',compact('portfolio'));
       } // End Method

    public function PortfolioList(){

        $list = Portfolio::all();

        return view('frontend.home_all.home_portfolio',compact('list'));

    }// End Method
}
