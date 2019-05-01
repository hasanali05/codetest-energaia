<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supply;
use Auth;

class SupplierController extends Controller
{
	public function index()
	{
		return redirect()->route('supplier.dashboard');
	}
	public function dashboard()
	{
		return view('supplier.dashboard');
	}
	public function addSupply()
	{
		return view('supplier.supplies.add');
	}
	public function allSupply()
	{
		$supplies = Supply::all();
		return view('supplier.supplies.index')->with(compact('supplies'));
	}
	public function pendingSupply()
	{
		$supplies = Supply::where('status','=','supplied')->get();
		return view('supplier.supplies.pending')->with(compact('supplies'));
	}
	public function storeSupply(Request $request)
	{
        $this->validate(request(), [
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
        ]);
        if(Auth::guard('supplier')->check())
        {
        	$supply = Supply::create([
        		'product_id'=> $request->product_id,
        		'supplier_id'=> Auth::guard('supplier')->user()->id,
        		'quantity'=> $request->quantity,
        		'status'=> 'supplied',
        	]);
        	$message = "Supply Added successfully. listed to any user.";
        } else {
        	$message = "Something wrong or some wrong moves.";
        }
        return redirect()->route('supplier.allSupply')->with('message', $message);
	}
}
