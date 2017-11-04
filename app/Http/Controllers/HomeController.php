<?php

namespace App\Http\Controllers;

use App\Lib\Article\ArticleRepository;
use App\Helpers\Helper;

use Validator;
use Carbon\Carbon;
use File;
use App;

class HomeController extends Controller
{
    public function index()
    {
        $path = public_path('product.json');
        $products = json_decode(file_get_contents($path), true);
        return view('welcome', [
            'products' => $products
        ]);
    }

    public function store()
    {
        $request = request()->all();
        $allData = [];

        $path = public_path('product.json');
        $json = json_decode(file_get_contents($path), true);
        if($json) {
            $allData = $json;
        }

        $newData = [
            'name' => $request['name'],
            'qty' => $request['qty'],
            'price' => $request['price'],
            'date' => Carbon::now()->toDateTimeString()
        ];
        $allData[] = $newData;

        File::put(public_path('product.json'),json_encode($allData));
        return $newData;
    }
}

