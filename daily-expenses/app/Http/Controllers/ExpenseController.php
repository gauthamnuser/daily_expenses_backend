<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function addExpense(Request $request)
    {
        DB::table('expenses')->insert(
        array(
            'expense_id'=>$request->expense_id,
            'type'=>$request->type,
            'total_expenses'=>$request->total_expenses,
            'user_id'=>$request->user_id,
            'exact'=>$request->exact,
           )
       );
        return response()->json([
            "Expenses successfuly added"
        ]);
    }

    public function userExpense($uname)
    {
        $id=DB::table('app_users')
        ->where('username',$uname)
        ->pluck('id')
        ->first();
        $data=DB::table('expenses')
        ->select('expense_id','type','total_expenses','exact')
        ->where('user_id',$id)
        ->get();
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function overallExpense($uname)
    {
        $id=DB::table('app_users')
        ->where('username',$uname)
        ->pluck('id')
        ->first();
        $sum=DB::table('expenses')
        ->select('expense_id','type','total_expenses','exact')
        ->where('user_id',$id)
        ->sum('exact');
        return response()->json([
            'Overall Expenses'=>$sum,
        ]);
    }

    public function downloadBalancesheet()
    {
        $sum=DB::table('expenses')
        ->select('expense_id','type','total_expenses','exact')
        ->groupBy('expense_id')
        ->get();
        $sum=$sum->sum('total_expenses');
        $expense_num=DB::table('expenses')
        ->distinct()
        ->count('expense_id');
        return response()->json([
            'Total expenses'=>$expense_num,
            'Sum of expenses'=>$sum,
        ]);
    }

}
