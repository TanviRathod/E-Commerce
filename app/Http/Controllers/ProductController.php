<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $rules = [
                'product_name'=>'required',
                'price'=>'required',
                'qty'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);
       
        if ($validator->fails()) {
            // Handle validation failure
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();

        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    
                            return $btn;
                    })
                    ->make(true);
        }
        
        return view('product.index');
    }

    public function product_details($id)
    {
        $productview = Product::findOrFail($id);             
        return view('product.productdetails',compact('productview'));
    }

   public function productBuy(Request $request)
   {
      $order = new Order();
      $order->user_id = Auth::id();
      $order->product_id = $request->product_id;
      $order->product_qty = $request->qty   ;
      $order->price =$request->totalprice;
      $order->save();
      
     return response()->json([
        'status'=>true
     ]);
   }
}
