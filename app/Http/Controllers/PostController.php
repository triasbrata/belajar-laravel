<?php

namespace App\Http\Controllers;

use App\Events\PostCreateOrUpdate;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Repository\Post\PostRepositoryInterface;
use Illuminate\Http\Request;
use Thortech\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $requestName;
    protected $model;
    protected $requestField;

    public function __construct()
    {
        $this->requestName = PostRequest::class;
        $this->model = app(PostRepositoryInterface::class);
        $this->requestField = ['slug','title','content','img'];
        parent::__construct();
    }

    public function crudCallback($request)
    {

        if($request->hasFile('image')){
            $file     = $request->image;
            $filename = uniqid(md5(date('Ymdhis'))).".".$file->getClientOriginalExtension();
            $path     = public_path('artikel');
            $request->image->move($path,$filename);
            $this->replaceRequest($request,['img'=>$filename]);
        }
        // dd($request->has('image'));
        $this->requestField = $request->has('image') ? ['slug','title','content','img'] : ['slug','title','content'];
        return $request;
    }

    public function callbackAfterCreateOrUpdate(Post $post)
    {
        auth()->user()->post()->save($post);
        event(new PostCreateOrUpdate($post));
    }


}
