<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class LandingController extends Controller
{
    public function index(){

        $category = Category::all();
        // return view('landingpage.index');
        $product = Product::all();
        return view('landingpage.index', compact('category', 'product'));
    }

    public function detail(Product $product){

        return view('landingpage.detail', compact('product'));

    }

    public function list(Product $product){

        return view('landingpage.list', compact('product'));

    }

    // public function cart(Product $product){

    //     return view('landingpage.cart', compact('product'));

    // }
}
