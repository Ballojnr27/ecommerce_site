<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footwears;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class FootwearsController extends Controller
{
    public function index()
    {
        $footwears = Footwears::all();

        return view('admin.footwears.index', compact('footwears'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $profileImage = null;

        if (isset($request['image'])) {

           if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName(); // yam.jpg
            $destinationPath = public_path('footwears');

            // Move image to public folder
            $image->move($destinationPath, $filename);

            // Save correct public path in DB
            $profileImage = $filename;
        }
        }

        $data['image'] = $profileImage;
        Footwears::create($data);

        return back();
    }

    public function update(Request $request, $id)
    {
        $footwear = Footwears::findOrFail($id);

        $data = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('footwears', 'public');
        } else {
            unset($data['image']);
        }

        $footwear->update($data);
        return back();
    }

    public function destroy($id)
    {
        Footwears::findOrFail($id)->delete();
        return back();
    }

    public function orders()
    {
        $orders = Order::all();
       // $customers = User::where('id', $orders->user_id)->get();

        return view('admin.footwears.orders', compact('orders'));
    }

     public function dispatchOrder($id)
    {
        $order = Order::findOrFail($id);
    $order->update(['dispatch_status' => 'Dispatched']);

    return redirect()->back()->with('success', 'Order marked as dispatched.');
    }


}
