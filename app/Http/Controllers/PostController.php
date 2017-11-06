<?php

namespace App\Http\Controllers;

use App\Events\PostCreateOrUpdate;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Repository\Post\PostRepositoryInterface;
use App\Tag;
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
        $this->requestField = ['slug', 'title', 'content', 'img', 'tag_id'];
        parent::__construct();
    }

    public function create()
    {
        $parent_tags = Tag::where('parent_id', null)->get()->pluck('title', 'id');

        return parent::create()->with('parent_tags', $parent_tags);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $view = parent::edit($id);
        $parent_id = null;
        $tags = [];
        if (null != $post->tag_id) {
            $tag = Tag::findOrFail($post->tag_id);
            $parent = $tag->parent;
            $parent_id = $parent->id;
            $tags = $parent->child->pluck('title', 'id');
        }
        $parent_tags = Tag::where('parent_id', null)->get()->pluck('title', 'id');
        $view->with('parent_id', $parent_id)->with('tags', $tags);

        return $view->with('parent_tags', $parent_tags);
    }

    public function crudCallback($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;
            $filename = uniqid(md5(date('Ymdhis'))).'.'.$file->getClientOriginalExtension();
            $path = public_path('artikel');
            $request->image->move($path, $filename);
            $this->replaceRequest($request, ['img' => $filename]);
        }
        // dd($request->has('image'));
        if (!$request->has('image')) {
            unset($this->requestField[3]);
        }

        return $request;
    }

    public function callbackAfterCreateOrUpdate(Post $post)
    {
        auth()->user()->post()->save($post);
        event(new PostCreateOrUpdate($post));
    }

    public function getLabel(Request $request)
    {
        return Tag::where('parent_id', $request->parent_id)->get()->pluck('title', 'id');
    }
}
