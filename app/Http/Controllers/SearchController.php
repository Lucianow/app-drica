<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchToday()
    {
        $today = now()->format('Y-m-d' );
        $bills = Bill::where("expiry", "=", $today)->orderBy('expiry', 'asc')->paginate(5);

        if ($bills->count() != 0){
            return view('home', compact('bills'));
        }
        else {
            return redirect()->route('home')
                ->with('success','Não há pagamentos agendados para Hoje!');
        }
    }


    public function searchWord(Request $request)
    {
        $query = "%".$request->search.'%';
        $bills = Bill::where("title", "LIKE", $query)->orWhere("description", "LIKE", $query)->orderBy('expiry', 'asc')->paginate(5);


        if ($bills->count() != 0){
            return view('home', compact('bills'));
        }
        else {
            return redirect()->route('home')
                ->with('success','Não encontramos nada relacionado! '.$request->search);
        }


    }
}
