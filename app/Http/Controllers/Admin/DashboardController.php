<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\Newsletter;
use App\Models\Payment;
use App\Models\ProductReturn;
use App\Models\Receipt;

class DashboardController extends Controller
{

    public function index()
    {
        $customers = Customer::get()->count();
        $products = Product::get()->count();
        $invoices = Invoice::get()->count();
        $messages = Message::get()->count();
        $posts = Post::get()->count();
        $newsletters = Newsletter::get()->count();
        $revenue = Transaction::sum('transaction_total');
        $success = Invoice::where('status', 'success')->count();
        $pending = Invoice::where('status', 'pending')->count();
        $failed = Invoice::where('status', 'failed')->count();
        $payments = Invoice::where('status', 'waiting fo payment')->count();
        $receipts = Invoice::where('status', 'waiting for receipt')->count();
        $complained = ProductReturn::get()->count();


        return view('pages.dashboard')->with([
            'customers' => $customers,
            'products' => $products,
            'invoices' => $invoices,
            'messages' => $messages,
            'posts' => $posts,
            'newsletters' => $newsletters,
            'success' => $success,
            'pending' => $pending,
            'failed' => $failed,
            'payments' => $payments,
            'receipts' => $receipts,
            'revenue' => $revenue,
            'complained' => $complained
        ]);
    }

    public function revenue()
    {
        $invoices = Invoice::where('status', 'success')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }

    public function success()
    {
        $invoices = Invoice::where('status', 'success')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }

    public function pending()
    {
        $invoices = Invoice::where('status', 'pending')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }

    public function payment()
    {
        $invoices = Invoice::where('status', 'waiting for payment')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }

    public function receipt()
    {
        $invoices = Invoice::where('status', 'waiting for receipt')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }

    public function complained()
    {
        //
    }

    public function failed()
    {
        $invoices = Invoice::where('status', 'failed')
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('pages.transactions.invoices.index')->with([
            'invoices' => $invoices
        ]);
    }
}
