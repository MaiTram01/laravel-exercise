<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slide;
use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\Comment;
use Illuminate\Http\Request;

class PageController 
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(4);
        $promotion_product = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('page.trangchu', compact('slide', 'new_product', 'promotion_product'));
    }
    public function getLoaiSp($type)									
        {									
        $sp_theoloai = Product::where('id_type', $type)->get();									
        $type_product = TypeProduct::all();									
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);									
                                            
        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));									
        }		
        public function getDetail(Request $request)
        {
            $sanpham = Product::where('id', $request->id)->first();
            $splienquan = Product::where('id', '<>', $sanpham->id)
                                ->where('id_type', '=', $sanpham->id_type)
                                ->paginate(3);
            $comments = Comment::where('id_product', $request->id)->get();
            
            return view('page.chitiet_sanpham', compact('sanpham', 'splienquan', 'comments'));
        }
                                    
}