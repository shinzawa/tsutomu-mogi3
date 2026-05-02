{{ $reservation->user->name }} 様

{{ $reservation->shop->name }} です。

{!! nl2br(e($messageText)) !!}

────────────
予約情報
────────────
店舗名：{{ $reservation->shop->name }}
日時　：{{ $reservation->date }} {{ $reservation->time }}
人数　：{{ $reservation->number_of_people }} 名

今後ともよろしくお願いいたします。
