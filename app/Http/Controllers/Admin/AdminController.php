<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $month = 12;

        $successTransactions = $this->chart(Transaction::getData($month , 1) , $month) ;
        $unsuccessTransactions = $this->chart(Transaction::getData($month , 0) , $month);



        // dd($monthName , $amount , $result , $shamsiMonths ,$chart);
        // dd( array_values($successTransactions)  , $unsuccessTransactions);
        return view('admin.dashboard' , [
            'labels' =>  array_keys($successTransactions),
            'successTransactions' =>  array_values($successTransactions),
            'unsuccessTransactions' => array_values($unsuccessTransactions),
            'transactionsCount' => [Transaction::getData($month , 1)->count() , Transaction::getData($month , 0)->count() ]
        ]);
    }
    public function chart($transactions , $month)
    {
        $monthName = $transactions->map(function($item){
            return verta($item->created_at)->format('%B %y');
        });
        $amount = $transactions->map(function($item){

            return $item->amount;
        });

        $result = [];
        foreach ($monthName as $i => $v) {
            if(!isset($result[$v])){
                $result[$v] = 0;
            }
            $result[$v] += $amount[$i];
        }

        if(count($result) != $month){
            for ($i=0; $i < $month; $i++) {
                $monthNames = verta()->subMonth($i)->format('%B %y');
                $shamsiMonths[$monthNames] = 0;
            }
            // dd($shamsiMonths);
            $chart = array_merge($shamsiMonths , $result);
            return array_reverse($chart);
        }

        return $result;

    }
}
