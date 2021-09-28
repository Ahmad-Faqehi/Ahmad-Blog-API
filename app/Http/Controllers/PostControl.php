<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->orderByDesc('id')->get();
        return  $posts;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $image_64 = $request->image;
        $url = 'http://127.0.0.1:8000/';
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $imageName = time().'.'.$extension;
        $this->base64_to_jpeg($image_64,$imageName);
        $requestData = $request->all();
        $requestData['image'] = $url . '/image/' . $imageName;
        return Post::create($requestData);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($post){
            return $post->update($request->all()) ? true : false;
        }else{
            return false;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post){
            Post::destroy($id);
            return true;
        }
        return false;
    }

    /**
     * To convert Base64 to Image file
     * @param string base64
     * @param image file name to save it
     *
     */
    function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( public_path().'/image/'.$output_file, 'wb' );

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp );

        return $output_file;
    }

    function findByCat($cat){
        $post = DB::table('posts')->where('category', '=', $cat)->get();
        return $post;
    }
}
