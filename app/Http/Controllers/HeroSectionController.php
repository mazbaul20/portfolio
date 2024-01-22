<?php

namespace App\Http\Controllers;

use auth;
use Exception;
use App\Models\User;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    public function HeroSectionPage(){
        return view('backend.pages.hero-section');
    }// end method
    public function CreateHeroSection(Request $request){
        
        try {
            $user = auth()->user();
            $user_email = $user->email;
            $img = $request->file('imageUrl');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name  = "{$user_email}-{$t}-{$file_name}";
            $img_url   = "uploads/{$img_name}";

            $img->move(public_path('uploads'),$img_name);

            HeroSection::create([
                'title'=>$request->input('title'),
                'subTitle1'=>$request->input('subTitle1'),
                'subTitle2'=>$request->input('subTitle2'),
                'imageUrl'=>$img_url,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Data created successful',
            ], 201);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 401);
        }
 
    }//end method
    public function HeroSectionList(){
        return HeroSection::all();
    }//end method
    public function HeroSectionById(Request $request){
        $sliderId= $request->input('id');
        return HeroSection::where('id',$sliderId)->first();
    }//end method
    public function UpdateHeroSection(Request $request){
        $user = auth()->user();
        $user_email = $user->email;
        $Id = $request->input('id');

        if($request->hasFile('imageUrl')){
            // Uploads new file
            $img = $request->file('imageUrl');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name  = "{$user_email}-{$t}-{$file_name}";
            $img_url   = "uploads/{$img_name}";
            $img->move(public_path('uploads'),$img_name);

            // Delete old file
            $filePath   = $request->input('file_path');
            File::delete($filePath);
            
            // Update product
            return HeroSection::where('id',$Id)->update([
                'title'=>$request->input('title'),
                'subTitle1'=>$request->input('subTitle1'),
                'subTitle2'=>$request->input('subTitle2'),
                'imageUrl'=>$img_url,
            ]);
        }else{
            return HeroSection::where('id',$Id)->update([
                'title'=>$request->input('title'),
                'subTitle1'=>$request->input('subTitle1'),
                'subTitle2'=>$request->input('subTitle2'),
            ]);
        }
    }//end method
    public function DeleteHeroSection(Request $request){
        $homesliderId   = $request->input('id');
        $filePath       = $request->input('file_path');
        File::delete($filePath);
        return HeroSection::where('id',$homesliderId)->delete();
    }//end method
}
