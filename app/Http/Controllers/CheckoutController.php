<?php

namespace App\Http\Controllers;
use App\Mail\TransactionSuccess;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details','travel_package','user'])->findOrFail($id);

        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $id)
    {
        $item = TransactionDetail::findorFail($id);

        $transaction = Transaction::with(['details','travel_package'])
            ->findOrFail($item->transaction_id);

        if($item->is_visa)
        {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if($request->is_visa)
        {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction_success = Transaction::with(['details','travel_package.galleries','user'])->findOrFail($id);
        $transaction_success->transaction_status = 'PENDING';

        // return $transaction_success;

        $transaction_success->save();

        // return $transaction_success;

        Mail::to($transaction_success->user)->send(
            new TransactionSuccess($transaction_success)
        );

         return view('pages.success');

        // set konfigurasi midtrans
        // Config::$serverKey = config('midtrans.serverKey');
        // Config::$isProduction = config('midtrans.isProduction');
        // Config::$isSanitized = config('midtrans.isSanitized');
        // Config::$is3ds = config('midtrans.is3ds');

        // $midtrans_params = [
        //     'transaction_detail' => [
        //         'order_id' => 'TEST-' . $transaction_success->id,
        //         'gross_amount' => (int) $transaction_success->transaction_total
        //     ],
        //     'customer_details' => [
        //         'first_name' => $transaction_success->user->name,
        //         'email' => $transaction_success->user->email,
        //     ],
        //     'enable_payments' => ['gopay'],
        //     'vtweb' => []
        // ];

        // try {
        //     //ambil halaman payment midtrans
        //     $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

        //     //redirect
        //     header('Location: ' . $paymentUrl);
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }
    }
}
