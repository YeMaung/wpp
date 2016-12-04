<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

use App\Post;
// use Yajra\Datatables\Facades\Datatables;
// use DB;
// use Illuminate\Support\Str;

// use DB;
// use Datatables;

use DB;
use Yajra\Datatables\Datatables;


class PostController extends Controller
{
	public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request, Datatables $datatables)
    {
        if ($request->ajax()) {
            // $posts = Post::select([
            //         'transactionlog_datetime',
            //         'trx',
            //         'activities_ref',
            //         // DB::raw("CAST(posts.created_at AS DATE) as start"),
            //         // DB::raw("CAST(posts.updated_at AS DATE) as end"),
            //     ]);

            // return Datatables::of($posts)
            //     // ->filter(function ($query) use ($request) {
            //     //     if ($request->has('start')) {
            //     //         return $query->where('posts.created_at', '>=', $request->get('start'));
            //     //     }
            //     //     if ($request->has('end')) {
            //     //         return $query->where('posts.updated_at', '<=', $request->get('end'));
            //     //     }
            //     // })
            // ->make(true);

            // $query = DB::table('transactionlog');

            // return Datatables::queryBuilder($query)->make(true);

            $query = DB::table('posts');

            return $datatables->queryBuilder($query)->make(true);
        }
    	return view('admin.post.index');
    }

    public function create()
    {
    	return view('admin.post.create');
    }

    public function store(PostRequest $request)
    {
    	// Post::create($request->all());
        $request->session()->push('user.teams', 'developers');
        $value = session('user');
        dd($value);

        $post = new Post;
        $post->title = $request->input('title');
        $post->slug = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/admin/post')->with('message', 'Post has been created!');;

    }

}
