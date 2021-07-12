<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchterm = $request->input('search');
        if($searchterm != null)
        {
            $searchResults = (new Search())
            /* Config columns in categories table*/
            ->registerModel(Category::class, ['name', 'description'])
            /* Config columns in products table*/
            ->registerModel(Product::class,  ['name', 'description'])
            /* Config columns in users table*/
            ->registerModel(User::class,  ['fullname', 'email'])
            ->perform($searchterm);

        return view('admin.pages.search.result_search', ['searchResult' => $searchResults]);
        }else{
            return back();
        }
    }
}
