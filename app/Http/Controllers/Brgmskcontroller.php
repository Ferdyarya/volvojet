<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brgmsk;
use App\Models\Product;
use App\Models\Supplier;

class Brgmskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Brgmsk::with(['unit', 'product'])->paginate(10);

        return view('customer.index',[
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $unit = Unit::all();
       $product = Product::all();
        return view('customer.create', [
            'unit' => $unit,
            'product' => $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Customers::create($data);

        return redirect()->route('customer.index');
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
    public function edit(Customers $customer)
    {
        $unit = Unit::all();
        $product = Product::all();

        return view('customer.edit', [
            'item' => $customer,
            'unit' => $unit,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customer)
    {
        $data = $request->all();

        $customer->update($data);

        //dd($data);

        return redirect()->route('customer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}

