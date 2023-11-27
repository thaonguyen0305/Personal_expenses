<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    function showListExpense()
    {
        $expenses = Expense::all();
        $totalAmount = $expenses->sum('amount');
        return view('expense.list', compact('expenses', 'totalAmount'));
    }

    function delete($id)
    { {
            $expense = Expense::findOrFail($id);
            $expense->delete();
            return redirect()->route('show-list-expense');
        }
    }

    function showFormCreate()
    {
        $categories = Category::all();
        return view('expense.add', compact('categories'));
    }
    function add(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'amount' => 'required',
        ]);

        Expense::create([
            'category' => $request->input('category'),
            'date' => $request->input('date'),
            'amount' => $request->input('amount'),
        ]);
        return redirect()->route('show-list-expense');
    }

    public function showFormEdit($id)
    {
        $expense = Expense::findOrFail($id);
        $categories = Category::all();
        return view('expense.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'date' => 'required',
            'amount' => 'required',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update([
            'category' => $request->input('category'),
            'date' => $request->input('date'),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('show-list-expense');
    }
}
