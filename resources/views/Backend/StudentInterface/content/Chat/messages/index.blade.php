@include('Backend.StudentInterface.modals.Chat.startCall')

<ul class="pl-4 call-buttons-list">
    <li class="py-2"><button data-toggle="modal" data-target="#startCallModal" onclick="loadCopmonent()" type="button" class="btn btn-orange btn-circle btn-xl"><i class="fas fa-video"></i></button></li>
    <li class="py-2"><button type="button" class="btn btn-blue btn-circle btn-xl"><i class="fas fa-phone"></i></button></li>
</ul>
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

