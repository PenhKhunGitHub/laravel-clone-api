<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    // Get All data from database
    public static function index(Request $request){
        // $user_id = $request->user()->id;
        // $posts = Post::where('user');
        $posts = Post::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'get all data',
                'data'    => $posts
            ]
        );
    }
    //Created data to database
    public static function store(Request $request){
        //Checked validation
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'content' => 'required',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $data= $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $filePath = public_path('/images');
            $image->move($filePath,$imageName);
            $data['image_url'] = $imageName;
        }
        Post::create($data);
        return response()->json(
            [
                'success' => true,
                'message' => 'created success.',
                'data'    => $data
            ]
        );
    }
    //Update data to database
    public static function update(Request $request,$id){
        $postId = Post::find($id);
        if(is_null($postId)){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'post id('.$id.') not found.',
                    'data' => null
                ],404
            );
        }

        if($request->hasFile('image')){ //checked hasfile image ;'image'= key for client
            $image = $request->file('image'); //get image from client
            $fileName = time().'.'.$image->getClientOriginalExtension(); //radome name image
            $filePath = public_path('images/'); //create folder 'images/' in public folder
            $image->move($filePath,$fileName);
            if(!is_null($postId->image_url)){ //Checked image_url from database
                $oldImage = public_path('images/'.$postId->image_url); //get public url in folder project
                if(File::exists($oldImage)){ // checked file exists
                    unlink($oldImage); // unlink url image in folder
                }
            }
            $postId->image_url = $fileName;
        }
        $postId->update($request->all());
        return response()->json(
            [
                'success' => true,
                'message' => 'updated post success.',
                'data' => $postId
            ],200
        );
    }

    public static function destroy($id){
        $postId = Post::findOrFail($id);
        if(is_null($postId)){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'post id('.$id.') not found.',
                    'data' => null
                ],404
            );
        }
        $imagePath = public_path('images/'.$postId->image_url);
        if(File::exists($imagePath)){
            File::delete($imagePath);
        }
        $postId->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'deleted post success.',
                'data' => $postId
            ],200
        );
    }
}
