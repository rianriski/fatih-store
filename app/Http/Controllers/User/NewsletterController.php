<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {

        $newsletters = Newsletter::where('status', 'Active')
            ->orderBy('created_at', 'desc')
            ->paginate(1);

        return view('pages.user.newsletters.index')->with([
            'newsletters' => $newsletters,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $newsletters = Newsletter::where('status', 'active')
            ->where('article', 'like', '%' . $search . '%')
            ->paginate(1);

        return view('pages.user.newsletters.index')->with([
            'newsletters' => $newsletters
        ]);
    }
}
