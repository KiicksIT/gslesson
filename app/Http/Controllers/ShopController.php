<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
    public function index()
    {
    	return view('shop.index');
    }

    public function indexApi()
    {
        $everything = request('everything');
        $sortkey = request('sortkey');
        $results = Shop::whereNotNull('created_at');

        if($everything) {
            $results = $results->where('name', 'LIKE', '%'.$everything.'%')
            					->orWhere('desc', 'LIKE', '%'.$everything.'%')
            					->orWhere('contact', 'LIKE', '%'.$everything.'%');
        }

        if($sortkey) {
            $results = $results->orderBy($sortkey, request('reverse') == 'true' ? 'asc' : 'desc');
        }else{
            $results = $results->latest();
        }

        $results = $results->paginate(request('perpage'));
        return $results;
    }
}
