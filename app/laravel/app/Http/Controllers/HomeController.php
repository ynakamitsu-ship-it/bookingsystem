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

    public function innMain()
{
    $posts = Post::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('inn_main', compact('posts'));
}

public function createPost()
{
    return view('create_post');
}

public function confirmPost(Request $request)
{
    return view('create_post_conf', [
        'title' => $request->title,
        'address' => $request->address,
        'price' => $request->price,
        'reserve_date' => $request->reserve_date,
        'max_people' => $request->max_people,
        'content' => $request->content,
    ]);
}



public function storePost(Request $request)
{
    $post = new Post();

    $post->user_id = Auth::id();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->address = $request->address;
    $post->price = $request->price;
    $post->max_people = $request->max_people;
    $post->reserve_date = $request->reserve_date;
    $post->del_flg = 0;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = $image->store('images', 'public');
        $post->image_path = $path;
    }

    $post->save();

    return redirect()->route('inn_main');
}

    public function post($id)
{
    $post = Post::findOrFail($id);

     $isBooked = Booking::where('user_id', auth()->id())
        ->where('post_id', $post->id)
        ->where('del_flg', 0)
        ->exists();

   return view('post', compact('post', 'isBooked'));
}

public function innPost($id)
{
    $post = Post::findOrFail($id);

    return view('inn_post', [
        'post' => $post
    ]);
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

    $exists = Booking::where('user_id', auth()->id())
    ->where('post_id', $post->id)
    ->where('del_flg', 0)
    ->exists();

if ($exists) {
    return back()->with('error', 'この旅館はすでに予約済みです。');
}

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

public function mybookingList()
{
    $bookings = Booking::where('user_id', auth()->id())
        ->where('del_flg', 0)
        ->with('post')
        ->get();

    return view('mybooking_list', compact('bookings'));
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