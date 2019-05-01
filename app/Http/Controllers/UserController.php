<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supply;
use App\Inventory;

class UserController extends Controller
{
	public function index()
	{
		return redirect()->route('user.dashboard');
	}
	public function dashboard()
	{
		return view('user.dashboard');
	}
	public function pendingSupplies()
	{
		$supplies = Supply::where('status', '=', 'supplied')->get();
		return view('user.pendingSupplies')->with(compact('supplies'));
	}
	public function supplyReceive(Supply $supply)
	{
		if($supply->status == 'supplied'){
			$inventory = Inventory::create([
				'product_id'=>$supply->product_id,
				'quantity'=>$supply->quantity,
				'status'=>'added',
			]);
			$supply->update([
				'status'=>'received'
			]);
			$message = "The supply received successfully!";
		} else {
			$message = "Something tried wrong.";
		}
		return back()->with('message', $message);
	}
	public function supplyCancel(Supply $supply)
	{
		if($supply->status == 'supplied'){
			$supply->update([
				'status'=>'canceled'
			]);
			$message = "The supply canceled successfully!";
		} else {
			$message = "Something tried wrong.";
		}
		return back()->with('message', $message);
	}
}
