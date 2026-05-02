{{ $user->name }} 様

{{ $shop->name }} です。
本日のご予約についてご案内いたします。

────────────
■ 予約情報
────────────
店舗名：{{ $shop->name }}
日時　：{{ $reservation->date }} {{ $reservation->time }}
人数　：{{ $reservation->number_of_people }} 名

ご来店を心よりお待ちしております。
