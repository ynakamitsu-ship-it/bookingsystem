<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Booking;
use App\Models\Report;
use App\Models\User;
use App\Models\Bookmark;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['storeRegister']);
    }

public function storeRegister(Request $request)
{
    $request->validate([
        'store_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ]);

    User::create([
        'name' => $request->store_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 1,
    ]);

    return redirect('/login')->with('success', '店舗アカウントを登録しました');
}

    public function index(Request $request)
    {
        $query = Post::where('del_flg', 0);

        // ① 旅館名・住所の検索
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                  ->orWhere('address', 'like', '%' . $keyword . '%');
            });
        }

        // ② 宿泊予定日（開始日）
        if ($request->filled('start_date')) {
            $query->whereDate('reserve_date', '>=', $request->start_date);
        }

        // ③ 宿泊予定日（終了日）
        if ($request->filled('end_date')) {
            $query->whereDate('reserve_date', '<=', $request->end_date);
        }

        // ④ 金額
        if ($request->filled('price')) {
            $query->where('price', '<=', $request->price);
        }

        $posts = $query
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', compact('posts'));
    }

    public function post($id)
{
    $post = Post::findOrFail($id);

    return view('post', compact('post'));
}

public function booking($id)
{
    $post = Post::findOrFail($id);

    return view('booking', compact('post'));
}

public function bookingConfirm(Request $request, $id)
{
      $post = Post::findOrFail($id);

    $booking = [
        'name' => $request->name,
        'phone' => $request->phone,
        'checkin' => $request->checkin,
        'checkout' => $request->checkout,
        'people' => $request->people,
    ];

    return view('booking_confirm', compact('post', 'booking'));
}

public function reserve(Request $request, $id)
{
    $post = Post::findOrFail($id);

    Booking::create([
        'user_id' => auth()->id(),
        'post_id' => $post->id,
        'name' => $request->name,
        'tel' => $request->phone,
        'checkin_date' => $request->checkin,
        'checkout_date' => $request->checkout,
        'booking_people' => $request->people,
        'del_flg' => 0,
    ]);

    return redirect('booking_comp');
}

public function bookmark($id)
{
    Bookmark::firstOrCreate([
        'user_id' => Auth::id(),
        'post_id' => $id,
    ]);

    return redirect('/post/' . $id);
}

public function bookmarkList()
{
    $bookmarks = Bookmark::with('post')
        ->where('user_id', auth()->id())
        ->get();

    return view('bookmark_list', compact('bookmarks'));
}

public function report($id)
{
    $post = Post::findOrFail($id);

    return view('report', compact('post'));
}

public function reportComplete(Request $request, $id)
{
    $post = Post::findOrFail($id);

    Report::create([
        'user_id' => auth()->id(),
        'post_id' => $post->id,
        'report_reason' => $request->reason,
    ]);

    return view('report_comp');
}

public function mypage()
{
    return view('general_mypage');
}
}