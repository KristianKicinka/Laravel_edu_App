<div id="newsletter">
    <h3>Chceš byť stále informovaný o novinkách na portáli?</h3>
    <p>Prihlás sa na odber nášho newslettra</p>
    {{Form::open(['method'=>'post','url'=>route('sendNewsletterMail')])}}
        <input type="email" name="email" placeholder="email@example.com" id="email_newsletter">
        <input type="submit" name="submit" value="Odoberať" id="submit" class="btn btn-orange">
    {{Form::close()}}
</div>
