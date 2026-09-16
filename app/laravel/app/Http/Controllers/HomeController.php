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
        $this->middleware('auth')->except(['top','post']);
    }

    public function top(Request $request)
{
    $query = Post::with('user')
        ->where('del_flg', 0)
        ->whereHas('user', function ($q) {
            $q->where('del_flg', 0);
        });

    // タイトル・内容・住所・店舗名から検索
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;

        $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', '%' . $keyword . '%')
              ->orWhere('content', 'like', '%' . $keyword . '%')
              ->orWhere('address', 'like', '%' . $keyword . '%')
              ->orWhereHas('user', function ($userQuery) use ($keyword) {
                  $userQuery->where('name', 'like', '%' . $keyword . '%');
              });
        });
    }

    // 宿泊予定日
    if ($request->filled('reserve_date')) {
        $query->where('reserve_date', '>=', $request->reserve_date);
    }

    // 金額
    if ($request->filled('price')) {
        $query->where('price', '<=', $request->price);
    }

    $posts = $query->latest()->get();

    return view('welcome', compact('posts'));
}

    public function accountEdit()
{
    return view('account_edit');
}

public function deleteAccountPage()
{
    $user = auth()->user();

    return view('delete_account', compact('user'));
}

public function deleteAccount()
{
    $user = auth()->user();

    $user->delete();

    auth()->logout();

    return redirect('/');
}

public function accountEditConf(Request $request)
{
    $request->validate([
    'name' => 'required',
    'email' => 'required|email',
    'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
], [
    'name.required' => 'ユーザ名を入力してください。',
    'email.required' => 'メールアドレスを入力してください。',
    'email.email' => 'メールアドレスの形式が正しくありません。',
    'icon.image' => '画像ファイルを選択してください。',
    'icon.mimes' => 'JPEG、PNG、JPG、GIF形式の画像を選択してください。',
    'icon.max' => '画像のサイズは2MB以内にしてください。',
]);

    $iconPath = null;

    if ($request->hasFile('icon')) {
        $iconPath = $request->file('icon')->store('icons', 'public');
    }

    return view('account_edit_conf', [
        'name' => $request->name,
        'email' => $request->email,
        'icon' => $iconPath,
    ]);
}


public function accountUpdate(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    // アイコンが選択されていた場合
    if ($request->icon) {
        $user->icon = $request->icon;
    }

    $user->save();

    return redirect()->route('general_mypage');
}


public function innMypage()
{
    $user = auth()->user();

    return view('inn_mypage', compact('user'));
}

public function innAccountEdit()
{
    $user = auth()->user();

    return view('inn_account_edit', compact('user'));
}
public function innAccountEditConf(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'name.required' => 'ユーザ名を入力してください。',
        'email.required' => 'メールアドレスを入力してください。',
        'email.email' => 'メールアドレスの形式が正しくありません。',
        'icon.image' => '画像ファイルを選択してください。',
        'icon.mimes' => 'JPEG、PNG、JPG、GIF形式の画像を選択してください。',
        'icon.max' => '画像のサイズは2MB以内にしてください。',
    ]);

    // アイコンを選択していた場合、一時的に保存
    $iconPath = null;

    if ($request->hasFile('icon')) {
        $iconPath = $request->file('icon')->store('icons', 'public');
    }

    return view('inn_account_edit_conf', [
        'user' => $user,
        'name' => $request->name,
        'email' => $request->email,
        'icon' => $request->file('icon'),
        'iconPath' => $iconPath,
    ]);
}

public function innAccountUpdate(Request $request)
{
    $user = auth()->user();

    $user->name = $request->name;
    $user->email = $request->email;

    // 確認画面から渡されたアイコンを保存
    if ($request->icon_path) {
        $user->icon = $request->icon_path;
    }

    $user->save();

    return redirect()->route('inn_mypage');
}

public function innDeleteAccount()
{
    $user = auth()->user();

    return view('inn_delete_account', compact('user'));
}
public function innDeleteAccountPost()
{
    $user = auth()->user();

    Auth::logout();

    $user->delete();

    return redirect()->route('home');
}

public function innBookingList()
{
    $user = auth()->user();

    $bookings = \DB::table('bookings')
        ->join('posts', 'bookings.post_id', '=', 'posts.id')
        ->where('posts.user_id', $user->id)
        ->select(
            'bookings.*'
        )
        ->get();

    return view('innbooking_list', compact('bookings'));
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
    ->paginate(5);

// 無限スクロールからのAjax通信の場合
if ($request->ajax()) {

    $html = '';

    foreach ($posts as $post) {

        $image = $post->image_path
            ? '<img src="' . asset('storage/' . $post->image_path) . '" class="img-fluid" alt="' . e($post->title) . '">'
            : '<p>画像なし</p>';

        $html .= '
        <div class="card mb-3">
            <div class="row align-items-center">

                <div class="col-md-3 text-center">
                    ' . $image . '
                </div>

                <div class="col-md-7">

                    <h2>' . e($post->title) . '</h2>

                    <p>店舗名：' . e($post->title) . '</p>

                    <p>住所：' . e($post->address) . '</p>

                    <p>金額：' . number_format($post->price) . '円</p>

                    <p>予約可能日：' . e($post->reserve_date) . '</p>

                </div>

                <div class="col-md-2 text-center">

                    <a href="' . url('/post/' . $post->id) . '"
                       class="btn btn-primary">
                        詳細
                    </a>

                </div>

            </div>
        </div>
        ';
    }

    return response()->json([
        'html' => $html,
        'hasMore' => $posts->hasMorePages(),
    ]);
}

return view('home', compact('posts'));
    }

   public function innMain(Request $request)
{
    $posts = Post::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->paginate(5);

    // 無限スクロールからのAjax通信の場合
    if ($request->ajax()) {

        $html = '';

        foreach ($posts as $post) {
            $html .= view('partials.inn_post_card', [
                'post' => $post
            ])->render();
        }

        return response()->json([
            'html' => $html,
            'hasMore' => $posts->hasMorePages(),
        ]);
    }

    // 最初にページを開いた場合
    return view('inn_main', compact('posts'));
}

public function createPost()
{
    return view('create_post');
}

public function confirmPost(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:50',
        'address' => 'required',
        'price' => 'required|numeric',
        'reserve_date' => 'required',
        'max_people' => 'required|integer',
        'content' => 'required|string|max:500',
    ], [
        'title.required' => 'タイトルを入力してください。',
        'title.max' => 'タイトルは50文字以内で入力してください。',

        'address.required' => '住所を入力してください。',

        'price.required' => '金額を入力してください。',
        'price.numeric' => '金額は数値で入力してください。',

        'reserve_date.required' => '予約可能日を入力してください。',

        'max_people.required' => '予約可能人数を入力してください。',
        'max_people.integer' => '予約可能人数は数値で入力してください。',

        'content.required' => '内容を入力してください。',
        'content.max' => '内容は500文字以内で入力してください。',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
    }

    return view('create_post_conf', [
        'title' => $request->title,
        'address' => $request->address,
        'price' => $request->price,
        'reserve_date' => $request->reserve_date,
        'max_people' => $request->max_people,
        'content' => $request->content,
        'image_path' => $imagePath,
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

    $post->image_path = $request->image_path;

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

public function booking($id)
{
    $post = Post::findOrFail($id);

    return view('booking', compact('post'));
}

public function bookingConfirm(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $request->validate([
        'name' => 'required|max:255',
        'tel' => ['required', 'regex:/^[0-9-]+$/'],
        'checkin_date' => 'required|date|after_or_equal:today',
        'checkout_date' => 'required|date|after:checkin_date',
        'booking_people' => 'required|integer|min:1|max:' . $post->max_people,
    ], [
        'name.required' => '名前を入力してください。',
        'name.max' => '名前は255文字以内で入力してください。',

        'tel.required' => '電話番号を入力してください。',
        'tel.regex' => '電話番号は数字とハイフンで入力してください。',

        'checkin_date.required' => 'チェックイン日を選択してください。',
        'checkin_date.date' => '正しいチェックイン日を選択してください。',
        'checkin_date.after_or_equal' => 'チェックイン日は今日以降の日付を選択してください。',

        'checkout_date.required' => 'チェックアウト日を選択してください。',
        'checkout_date.date' => '正しいチェックアウト日を選択してください。',
        'checkout_date.after' => 'チェックアウト日はチェックイン日より後の日付を選択してください。',

        'booking_people.required' => '予約人数を入力してください。',
        'booking_people.integer' => '予約人数は数字で入力してください。',
        'booking_people.min' => '予約人数は1人以上で入力してください。',
        'booking_people.max' => '予約可能人数を超えています。',
    ]);

    $booking = [
        'name' => $request->name,
        'tel' => $request->tel,
        'checkin_date' => $request->checkin_date,
        'checkout_date' => $request->checkout_date,
        'booking_people' => $request->booking_people,
    ];

    return view('booking_confirm', compact('post', 'booking'));
}

public function innBookingConf($id)
{
    $booking = \App\Models\Booking::with(['post'])->findOrFail($id);

    return view('innbooking_conf', compact('booking'));
}

public function reserve(Request $request, $id)
{
    $post = Post::findOrFail($id);

    // 同じ旅館をすでに予約していないか確認
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
        'tel' => $request->tel,
        'checkin_date' => $request->checkin_date,
        'checkout_date' => $request->checkout_date,
        'booking_people' => $request->booking_people,
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

public function mybookingConf($id)
{
    $booking = Booking::with('post')
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->where('del_flg', 0)
        ->firstOrFail();

    return view('mybooking_conf', compact('booking'));
}

public function deleteMybooking($id)
{
    $booking = Booking::with('post')
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    return view('delete_mybooking', compact('booking'));
}

public function deleteMybookingPost($id)
{
    $booking = Booking::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $booking->delete();

    return redirect()->route('mybooking_list');
}
public function mybookingEdit($id)
{
    $booking = Booking::with('post')
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->where('del_flg', 0)
        ->firstOrFail();

    return view('mybooking_edit', compact('booking'));
}

public function mybookingEditConf(Request $request, $id)
{
    $booking = Booking::with('post')
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->where('del_flg', 0)
        ->firstOrFail();

    $request->validate([
    'name' => 'required|string|max:10',
    'tel' => 'required|string|max:20',
    'checkin_date' => 'required|date|after_or_equal:today',
    'checkout_date' => 'required|date|after:checkin_date',
    'booking_people' => 'required|integer|min:1|max:' . $booking->post->max_people,
], [
    'name.required' => '名前を入力してください。',
    'name.max' => '名前は10文字以内で入力してください。',

    'tel.required' => '電話番号を入力してください。',
    'tel.max' => '電話番号は20文字以内で入力してください。',

    'checkin_date.required' => 'チェックイン日を入力してください。',
    'checkin_date.date' => '正しい日付を入力してください。',
    'checkin_date.after_or_equal' => 'チェックイン日は今日以降の日付を入力してください。',

    'checkout_date.required' => 'チェックアウト日を入力してください。',
    'checkout_date.date' => '正しい日付を入力してください。',
    'checkout_date.after' => 'チェックアウト日はチェックイン日より後の日付を入力してください。',

    'booking_people.required' => '予約人数を入力してください。',
    'booking_people.integer' => '予約人数は数値で入力してください。',
    'booking_people.min' => '予約人数は1人以上で入力してください。',
    'booking_people.max' => '予約可能人数を超えています。',
]);

    $data = $request->only([
        'name',
        'tel',
        'checkin_date',
        'checkout_date',
        'booking_people',
    ]);

    return view('mybooking_edit_conf', [
    'booking' => $booking,
    'data' => $data,
    ]);
}

public function mybookingUpdate(Request $request, $id)
{
    $booking = Booking::where('id', $id)
        ->where('user_id', auth()->id())
        ->where('del_flg', 0)
        ->firstOrFail();

    $booking->update([
        'name' => $request->name,
        'tel' => $request->tel,
        'checkin_date' => $request->checkin_date,
        'checkout_date' => $request->checkout_date,
        'booking_people' => $request->booking_people,
    ]);

    return redirect()->route('mybooking_list');
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
public function reportConf(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $request->validate([
        'reason' => 'required',
    ], [
        'reason.required' => '通報理由を入力してください。',
    ]);

    return view('report_conf', [
        'reason' => $request->reason,
        'post' => $post,
    ]);
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

public function innReport($id)
{
    $booking = Booking::with('user')->findOrFail($id);

    return view('inn_report', [
        'booking' => $booking
    ]);
}

public function innReportConf(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

    $request->validate([
        'reason' => 'required',
    ], [
        'reason.required' => '通報理由を入力してください。',
    ]);

    return view('inn_report_conf', [
        'booking' => $booking,
        'reason' => $request->reason,
    ]);
}

public function innReportComp(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

    Report::create([
        'user_id' => $booking->user_id,
        'post_id' => $booking->post_id,
        'report_reason' => $request->input('reason'),
    ]);

    return view('inn_report_comp', [
        'booking' => $booking
    ]);
}

public function mypage()
{
    return view('general_mypage');
}

public function editPost($id)
{
    $post = Post::findOrFail($id);

    return view('edit_post', compact('post'));
}

public function editPostConf(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $request->validate([
        'title' => 'required|max:50',
        'address' => 'required',
        'price' => 'required|numeric',
        'reserve_date' => 'required',
        'max_people' => 'required|numeric',
        'content' => 'required|max:500',
    ], [
        'title.required' => 'タイトルを入力してください。',
        'title.max' => 'タイトルは50文字以内で入力してください。',

        'address.required' => '住所を入力してください。',

        'price.required' => '金額を入力してください。',
        'price.numeric' => '金額は数値で入力してください。',

        'reserve_date.required' => '予約可能日を入力してください。',

        'max_people.required' => '予約可能人数を入力してください。',
        'max_people.numeric' => '予約可能人数は数値で入力してください。',

        'content.required' => '内容を入力してください。',
        'content.max' => '内容は500文字以内で入力してください。',
    ]);

    return view('edit_post_conf', [
        'post' => $post,
        'title' => $request->title,
        'image' => $request->image,
        'price' => $request->price,
        'reserve_date' => $request->reserve_date,
        'max_people' => $request->max_people,
        'content' => $request->content,
        'address' => $request->address,
    ]);
}

public function updatePost(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $post->update([
        'title' => $request->title,
        'price' => $request->price,
        'reserve_date' => $request->reserve_date,
        'max_people' => $request->max_people,
        'content' => $request->content,
    ]);

    return redirect()->route('inn_post', ['id' => $id]);
}

public function deletePost($id)
{
    $post = Post::findOrFail($id);
    Booking::where('post_id', $id)->delete();
    Report::where('post_id', $id)->delete();

    $post->delete();

    return redirect()->route('inn_main');
}

public function adminMain()
{
    return view('admin_main');
}

public function userList()
{
    // 一般ユーザー
    $generalUsers = User::where('role', 0)
        ->where('del_flg', 0)
        ->withCount('reports')
        ->orderByDesc('reports_count')
        ->get();

    // 旅館運営ユーザー
    $innUsers = User::where('role', 1)
        ->where('del_flg', 0)
        ->withCount([
            'posts as deleted_posts_count' => function ($query) {
                $query->where('del_flg', 1);
            }
        ])
        ->orderByDesc('deleted_posts_count')
        ->get();

    return view('user_list', compact('generalUsers', 'innUsers'));
}

public function postList()
{
    $posts = Post::with('user')
        ->withCount('reports')
        ->where('del_flg', 0)
        ->orderByDesc('reports_count')
        ->get();

    return view('post_list', compact('posts'));
}
public function deleteUser($id)
{
    $user = User::findOrFail($id);

    $reports = Report::where('user_id', $id)->get();

    return view('delete_user', compact('user', 'reports'));
}

public function deleteUserPost($id)
{
    $user = User::findOrFail($id);

    $user->del_flg = 1;
    $user->save();

    return redirect()->route('user_list');
}

public function deletePostPage($id)
{
    $post = Post::findOrFail($id);

    $reports = Report::where('post_id', $id)->get();

    return view('delete_post', compact('post', 'reports'));
}

public function deletePostPost($id)
{
    $post = Post::findOrFail($id);

    // 物理削除せず、削除フラグを1にする
    $post->del_flg = 1;
    $post->save();

    return redirect()->route('post_list');
}
}