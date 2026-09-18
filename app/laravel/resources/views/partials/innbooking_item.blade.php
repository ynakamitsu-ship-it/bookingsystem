<div class="card mb-4">
    <div class="card-body">

        <div class="row align-items-center">

            {{-- 左：予約者情報 --}}
            <div class="col-md-5">

                <h5 class="mb-3">
                    予約者情報
                </h5>

                <h4 class="mb-3">
                    名前：{{ $booking->name }}
                </h4>

                <p>
                    電話番号：{{ $booking->tel }}
                </p>

                <p>
                    チェックイン：{{ $booking->checkin_date }}
                </p>

                <p>
                    チェックアウト：{{ $booking->checkout_date }}
                </p>

                <p>
                    予約人数：{{ $booking->booking_people }}人
                </p>

            </div>


            {{-- 中央：予約した投稿情報 --}}
            <div class="col-md-3">

                <h5 class="mb-3">
                    予約投稿
                </h5>

                <p>
                    <strong>タイトル：</strong>
                    {{ $booking->title }}
                </p>

                <p>
                    <strong>住所：</strong>
                    {{ $booking->address }}
                </p>

                <p>
                    <strong>内容：</strong>
                    {{ $booking->content }}
                </p>

            </div>


            {{-- 右寄り：投稿画像 --}}
            <div class="col-md-2 text-center">

                @if($booking->image_path)

                    <img
                        src="{{ asset('storage/' . $booking->image_path) }}"
                        class="img-fluid rounded"
                        style="width: 180px; height: 130px; object-fit: cover;"
                        alt="投稿画像"
                    >

                @else

                    <div class="border p-4">
                        画像なし
                    </div>

                @endif

            </div>


            {{-- 一番右：確認ボタン --}}
            <div class="col-md-2 text-center">

                <a
                    href="{{ route('innbooking_conf', $booking->id) }}"
                    class="btn btn-primary"
                >
                    確認
                </a>

            </div>

        </div>

    </div>
</div>