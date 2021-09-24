<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\FavoriteArticles;

/**
 * Class ArticleController.
 */
class ArticleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Articles::OrderBy('updated_at', 'DESC')->get();

        return view('frontend.articles', ['articles' => $articles]);
    }

    public function singleArticle($id)
    {
        $article = Articles::where('id', $id)->first();

        $more_articles = Articles::inRandomOrder()->limit(5)->get();

        return view('frontend.single_article', ['article' => $article, 'more_articles' => $more_articles]);
    }


    public function favoriteArticle(Request $request) {

        $article_id = $request->hidden_id;
        $status = $request->favorite;
        $user_id = auth()->user()->id;


        if($status == 'non-favorite') {

            $favorite = new FavoriteArticles;

            $favorite->user_id = $user_id; 

            $favorite->article_id = $article_id;

            $favorite -> save();

            return back();
        }

        if($status == 'favorite') {

            $favorite = FavoriteArticles::where('user_id', $user_id)->where('article_id', $article_id)->delete();

            return back();
        }
    }
}
