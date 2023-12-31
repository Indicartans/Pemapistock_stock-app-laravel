<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AccessoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all()->pluck('name', 'id');
        // where('id', 1)->get()->pluck('name','id');
        $producs = Product::where('category_id', 2)->get();

        return view('accessories.index', compact('category', 'producs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::where('id', 1)
            ->orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');


        $this->validate($request, [
            'nama'          => 'required|string',
            'harga_beli'         => 'required',
            'qty'           => 'required',
            'category_id'   => 'required',
            'nomer_spb' => 'required',
            'keterangan' => 'required'
        ]);

        $input = $request->all();

        Product::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Products Created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');
        $product = Product::find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');

        $this->validate($request, [
            'nama'          => 'required|string',
            'harga_beli'         => 'required',
            'qty'           => 'required',
            'category_id'   => 'required',
        ]);

        $input = $request->all();
        $produk = Product::findOrFail($id);

        $produk->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Products Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // if (!$product->image == NULL){
        //     unlink(public_path($product->image));
        // }

        Product::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Products Deleted'
        ]);
    }

    public function apiProducts()
    {
        $products = Product::with('category')->whereHas('category', function ($query) {
            $query->where('id', 1);
        })->get();

        return Datatables::of($products)
            ->addColumn('category_name', function ($product) {
                return $product->category->name;
            })
            ->addColumn('action', function ($product) {
                return
                    '<a onclick="editForm(' . $product->id . ')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData(' . $product->id . ')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['category_name', 'action'])
            ->make(true);
    }
}
