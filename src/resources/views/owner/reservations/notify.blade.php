<form action="{{ route('owner.reservation.sendNotify', $reservation->id) }}" method="post">
    @csrf

    <div>
        <label>宛先</label>
        <input type="email" value="{{ $reservation->user->email }}" disabled>
    </div>

    <div>
        <label>件名</label>
        <input type="text" name="subject" value="{{ old('subject', '予約に関するお知らせ') }}">
    </div>

    <div>
        <label>本文</label>
        <textarea name="message" rows="8">{{ old('message') }}</textarea>
    </div>

    <button type="submit">送信する</button>
</form>
