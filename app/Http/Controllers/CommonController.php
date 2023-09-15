<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\History;
use App\Models\Receipt;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    //
    public function dashboard()
    {
        return view('dashboard')->with([
            "clients_count" => Client::count(),
            "orders_count" => Receipt::count(),
            "sales_total" => Receipt::sum("total"),
            "profit_total" => DB::table("histories")->selectRaw("(sum(sell_price) - sum(buy_price)) as profit")->where("direction", "out")->first()->profit,
        ]);
    }

    public function home()
    {
        return view('home');
    }
}
