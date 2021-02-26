<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Message;
use App\Models\ProductReturn;
use App\Models\Review;
use App\Models\ShippingAddress;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $countOrder = Invoice::where('user_id', Auth::id())->count();
        $reviews = Review::where('user_id', Auth::id())->count();
        $returns = ProductReturn::where('user_id', Auth::id())->count();
        $messages = Message::where('user_id', Auth::id())->count();
        $comments = Comment::where('user_id', Auth::id())->count();
        $comments = Comment::where('user_id', Auth::id())->count();
        $addresses = ShippingAddress::where('user_id', Auth::id())->count();

        $orders = Invoice::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $wishlists = Wishlist::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.user.dashboard')->with([
            'countOrder' => $countOrder,
            'reviews' => $reviews,
            'returns' => $returns,
            'messages' => $messages,
            'comments' => $comments,
            'addresses' => $addresses,
            'orders' => $orders,
            'wishlists' => $wishlists
        ]);
    }

    public function success()
    {
        $orders = Invoice::where('status', 'success')->paginate(5);

        return view('pages.user.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function pending()
    {
        $orders = Invoice::where('status', 'pending')->paginate(5);

        return view('pages.user.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function receipt()
    {
        $orders = Invoice::where('status', 'receipt')->paginate(5);

        return view('pages.user.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function failed()
    {
        $orders = Invoice::where('status', 'failed')->paginate(5);

        return view('pages.user.orders.index')->with([
            'orders' => $orders
        ]);
    }
}
