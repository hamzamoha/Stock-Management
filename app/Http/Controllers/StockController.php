<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('stock')->with('stocks', $stocks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => ['required'],
            'buy_price' => ['required', 'numeric'],
            'sell_price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric']
        ]);

        $stock = Stock::where('name', $request->product_name)
            ->where('buy_price', $request->buy_price)
            ->where('sell_price', $request->sell_price)->first();

        if ($stock) {
            $stock->quantity = intval($stock->quantity) + intval($request->quantity);
        } else {
            $stock = new Stock();
            $stock->name = $request->product_name;
            $stock->quantity = $request->quantity;
            $stock->buy_price = $request->buy_price;
            $stock->sell_price = $request->sell_price;
        }
        if ($stock->save()) {
            return redirect('/stock');
        } else return back()->with('error', 'An error accured while saving your data')->withInput();
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

    public function withdraw_index()
    {
        $stocks = Stock::all();
        return view('withdraw')->with('stocks', $stocks);
    }

    public function withdraw(Request $request)
    {
        $request = $request->all();
        $backup = array();
        $error = 0;
        foreach ($request as $foxit) {
            $stock = Stock::find($foxit["id"]);
            if ($stock && $stock->name == $foxit["name"] && $stock->buy_price == $foxit["buy_price"] && intval($stock->quantity) >= intval($foxit["quantity"])) {
                array_push($backup, $stock);
                $stock->quantity = intval($stock->quantity) - intval($foxit["quantity"]);
                if(!$stock->save()) {
                    $error = 1;
                    break;
                }
            }
            else {
                $error = 2;
            }
        }
        if($error != 0){
            foreach ($backup as $backup_rec) {
                $backup_rec->save();
            }
            return response()->json([
                "error" => "Something went wrong ! Error Code $error"
            ]);
        }
        else return response()->json([
            "success" => "Data saved successfully"
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $result = Stock::where('name', 'like', "%$query%")->take(3)->get();
        return response()->json($result);
    }
}
