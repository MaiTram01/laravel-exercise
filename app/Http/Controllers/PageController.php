<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slide;
use App\Models\Product;
use App\Models\TypeProduct;

class PageController 
{
    public function getIndex()
    {
        $slide = Slide::all();
        $newproducts = Product::where('new', 1)->paginate(4);
        $promotion_products = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('page.trangchu', compact('slide', 'newproducts', 'promotion_products'));
    }
    public function getLoaiSp($type)									
        {									
        $sp_theoloai = Product::where('id_type', $type)->get();									
        $type_product = TypeProduct::all();									
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);									
                                            
        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));									
        }									
}