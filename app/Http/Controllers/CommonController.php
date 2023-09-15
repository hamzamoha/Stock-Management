<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\History;
use App\Models\Receipt;
use App\Models\ReceiptHistory;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function dashboard()
    {
        return view('dashboard')->with([
            "clients_count" => Client::count(),
            "orders_count" => Receipt::count(),
            "sales_total" => Receipt::sum("total"),
            "profit_total" => History::selectRaw("sum((sell_price - buy_price) * quantity) as profit")->where("direction", "out")->first()->profit,
            "spent_total" => History::selectRaw("sum(buy_price * quantity) as spent")->where("direction", "in")->first()->spent,
            "stocks_worth" => Stock::selectRaw("sum(buy_price * quantity) as worth")->where("quantity", ">", "0")->first()->worth,
            "charts_data" => Receipt::selectRaw("date_format(created_at, '%b %Y') as new_date, sum(total) as big_total")->groupBy('new_date')->get(),
            "charts_data2" => History::selectRaw("date_format(created_at, '%b %Y') as new_date, sum((sell_price - buy_price) * quantity) as big_profit")->where("direction", "out")->groupBy('new_date')->get(),
        ]);
    }

    public function home()
    {
        return view('home');
    }

    private function random_order()
    {
        $histories = [];
        $stocks = Stock::inRandomOrder()->where("quantity", ">", "0")->limit(rand(2, 8))->get();
        $receipt = new Receipt();
        foreach ($stocks as $stock) {
            $history = new History($stock->name, $stock->sell_price, $stock->buy_price, rand(1, max(1, $stock->quantity / 2)), "out");
            $stock->quantity -= $history->quantity;
            if ($stock->quantity < 0) continue;
            array_push(
                $histories,
                $history
            );
            $stock->save();
            $receipt->total += $history->sell_price * $history->quantity;
        }
        $receipt->status = "processing";
        $receipt->save();
        foreach ($histories as $history) {
            $history->save();
            $receipt_history = new ReceiptHistory($receipt->id, $history->id);
            $receipt_history->save();
        }
        $temp_arr = ["credit_card", "cash", "check"];
        if (rand() % 10 == 4) {
            $receipt->status = "unpaid";
        } else {
            $receipt->status = "paid";
            $receipt->payment_method = $temp_arr[rand(0, 2)];
            if ($receipt->payment_method == "credit_card") {
                DB::table('cc_transactions')->insert([
                    'serial_number' => ($receipt->id * rand(2, 6) + rand(2, 4569)) + rand(110000, 451200),
                    'amount' => $receipt->total,
                    'receipt_id' => $receipt->id,
                ]);
            } else if ($receipt->payment_method == "check") {
                DB::table('checks')->insert([
                    'serial_number' => ($receipt->id * rand(2, 6) + rand(2, 4569)) + rand(110000, 451200),
                    'amount' => $receipt->total,
                    'receipt_id' => $receipt->id,
                ]);
            }
        }
        if (rand() % 8 == 4 && $receipt->status == "paid") {
            //guest
        } else {
            $client = Client::inRandomOrder()->first();
            $receipt->client_id = $client->id;
        }
        $receipt->save();
    }
}
