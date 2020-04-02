<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $message)
        <li class="message clearfix">
            <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'recived' }}">
                <p>{{ $message->message }}</p>
                <p class="date">{{ date('d M y, h:i a ',strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="input-text">
    <input type="text" name="message" class="submit text-input" id="input-message">
    <button class="btn btn-orange" id="send-button" >Odoslať</button>
</div>
