<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbook;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use League\CommonMark\CommonMarkConverter;
class HandbookController extends Controller
{
    private $handbook;
    private $user;

    public function __construct(Handbook $handbook, User $user){
        $this->handbook = $handbook;
        $this->user = $user;
    }
    //
    public function getAllNews($view)
    {
    $posts = Handbook::with('user')->get();
    return view($view, compact('posts'));

    }
    public function getallPosts(){
        return $this->getAllNews('clients.posts');
    }
    public function getAllHandbook(){
        return $this->getAllNews('admin.posts.postManagement');
    }
    public function addNewPost(){
        return view('admin.posts.createPost');
    }
    public function editPost($id){
        $post = $this->handbook->find($id);
        if(!post){
            return $this->getAllNews('admin.posts.postManagement');
        }
        else{
            return view('admin.posts.editPost', compact('post'));
        }
    }
    public function store(Request $request){
        $userId = Auth::id();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imageDoctors', 'public');
            $request->image = $imagePath; // Cập nhật ảnh mới
        }
        $this->handbook->create([
            'title' => $request->title,
            'image' => $request->image,
            'content' => $request->content,
            'author' => $userId
        ]);
        return redirect()->route('get_all_handbook');
    }
    public function update(Request $request){
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imageDoctors', 'public');
            $request->image = $imagePath; // Cập nhật ảnh mới

            $this->handbook->find($request->id)->update([
                'title' => $request->title,
                'image' => $request->image,
                'content' => $request->content
            ]);
        }
        $this->handbook->find($request->id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
       
        return redirect()->route('get_all_handbook');
    }
    public function delete($id){
        $post = $this->handbook->find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        $post->delete();
        return response()->json(['success' => 'Post deleted successfully']);
    }
    public function getOnePostById($id){
        $post = Handbook::with('user')->find($id);
        if(!$post){
            return $this->getAllNews('clients.posts');
        }
        else{
            $converter = new CommonMarkConverter();
            $content = $converter->convertToHtml($post->content);
            return view('clients.detailPost',compact('post','content'));
        }
    }

    //Get posts by authorId
    public function getPostsByAuthor($id){
        $posts = $this->handbook->where('author',$id)->get();
        return view('admin.posts.postManagement',compact('posts'));
    }
}
