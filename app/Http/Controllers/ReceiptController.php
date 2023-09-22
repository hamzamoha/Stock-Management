<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Receipt::orderBy('id', 'DESC')->paginate(25);
        return view("receipt.index")->with("receipts", $receipts);
    }

    public function cc_transactions_index()
    {
        $transactions = DB::table("cc_transactions")->orderBy('id', 'DESC')->paginate(25);
        return view("cc_transactions")->with("transactions", $transactions);
    }

    public function checks_index()
    {
        $checks = DB::table("checks")->orderBy('id', 'DESC')->paginate(25);
        return view("checks")->with("checks", $checks);
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
    public function store(Request $request, int $receipt_id)
    {
        $receipt = Receipt::find($receipt_id);
        if ($receipt->status != "processing") {
            return redirect()->back()->withErrors(["error" => "Receipt already processed !"]);
        }
        if ($request->input("client_option") == "guest" && $request->input("payment_status") == "unpaid") {
            return redirect()->back()->withErrors(["error" => "Unpaid receipts are only for registered clients !"]);
        }
        if (Client::where("name", $request->input("new_client_name"))->exists()) {
            return redirect()->back()->withErrors(["error" => "Client name already exists !"]);
        }
        if (Client::where("phone_number", $request->input("new_client_phone_number"))->exists()) {
            return redirect()->back()->withErrors(["error" => "Client phone number already exists !"]);
        }
        if (!in_array($request->input("client_option"), ["guest", "regular", "new"])) {
            return redirect()->back()->withErrors(["error" => "Client option error !"]);
        }
        if (!in_array($request->input("payment_method"), ["credit_card", "check", "cash"])) {
            return redirect()->back()->withErrors(["error" => "Payment method error !"]);
        }
        if (!in_array($request->input("payment_status"), ["paid", "unpaid"])) {
            return redirect()->back()->withErrors(["error" => "Payment Status error !"]);
        }
        if ($request->input("client_option") == "new") {
            $client = new Client();
            $client->name = $request->input("new_client_name");
            $client->phone_number = $request->input("new_client_phone_number");
            $client->save();
            $receipt->client_id = $client->id;
        } else if ($request->input("client_option") == "regular") {
            $client = Client::find($request->input("regular_id"));
            $receipt->client_id = $client->id;
        }
        $receipt->status = $request->input("payment_status");
        if ($receipt->status == "paid") {
            $receipt->payment_method = $request->input("payment_method");
            if ($receipt->payment_method == "credit_card") {
                DB::table('cc_transactions')->insert([
                    'serial_number' => $request->input("transaction_serial_number"),
                    'amount' => $request->input("transaction_amount"),
                    'receipt_id' => $receipt->id,
                ]);
            } else if ($receipt->payment_method == "check") {
                DB::table('checks')->insert([
                    'serial_number' => $request->input("check_serial_number"),
                    'amount' => $request->input("check_amount"),
                    'receipt_id' => $receipt->id,
                ]);
            }
        }
        $receipt->save();
        return redirect("/receipts")->with("success", "The receipt is saved successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $receipt_id)
    {
        $receipt = Receipt::find($receipt_id);
        if ($receipt) return view("receipt.show")->with("receipt", $receipt);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    public function pay(int $receipt_id)
    {
        $receipt = Receipt::find($receipt_id);
        if ($receipt) {
            return view("receipt.pay")->with("receipt", $receipt);
        } else return redirect("/receipts");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipt $receipt)
    {
        //
    }

    function search_clients(Request $request)
    {
        $query = $request->input('query');
        $result = Client::where('name', 'like', "%$query%")->take(3)->get();
        return response()->json($result);
    }
}
