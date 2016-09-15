<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use DB;

class ArticleController extends Controller
{
    //
    public function show(){
        $articles = DB::table('articles')->paginate(10);

        return view('bloghome', ['articles' => $articles]);
    }

    public function create(Request $requset){
        $info = $requset->all();
        $article = new Article();
        $article->title = $info['title'];
        $article->brief = $info['brief'];
        $article->content = $info['content'];
        $article->keyword = $info['keyword'];
        $article->save();
        return;
    }

    public function delete(Request $requset){
        $id = $requset->all()['id'];
        $article = Article::findOrFail($id);
        if($article != null){
            $article->delete();
        }
    }

    public function info($id){
        $article = Article::findOrFail($id);
        if($article != null){
            return view('show', ['article' => $article, 'status' => 1]);
        }else{
            return view('show', ['status' => 0]);
        }
    }
}
