<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function create_fx(Request $data)
    {
        $dbproduct = new Product;
        $dbproduct->name = $data->input('product_name');
        $dbproduct->price = $data->input('product_price');
        $dbproduct->description = $data->input('product_info');
        $dbproduct->filepath = $data->file('product_file')->store('product-images');
        $dbproduct->save();
        return $dbproduct;
    }

    function display_fx()
    {
        return Product::all();
    }

    function delete_fx($id)
    {
        $result = Product::where('id',$id)->delete();
        if ($result){
            return ['result'=>'product has been deleted'];
        } else return ['result'=>'operation failed'];
    }

    function getproductbyid_fx($id)
    {
        return Product::find($id);
    }

    function updateproduct_fx($id, Request $data)
    {
        $dbproduct = Product::find($id);
        $dbproduct->name = $data->input('product_name');
        $dbproduct->price = $data->input('product_price');
        $dbproduct->description = $data->input('product_info');
        if ($data->file('product_file'))
        {
            $dbproduct->filepath = $data->file('product_file')->store('product-images');
        }
        $dbproduct->save();
        return $dbproduct;
    }

    function search_fx($keyword)
    {
        return Product::where('description','LIKE',"%$keyword%")
                    ->orWhere('name','LIKE',"%$keyword%")->get();
    }
}
