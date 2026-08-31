<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        'del_flg' =>0,
    ]);

    return redirect('/home');
}
}