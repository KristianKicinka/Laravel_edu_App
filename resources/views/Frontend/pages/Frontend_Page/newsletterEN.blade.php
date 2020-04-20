<div id="newsletter">
    <h3>Want to stay informed about news on the portal?</h3>
    <p>Subscribe to our newsletter</p>
    {{Form::open(['method'=>'post','url'=>route('sendNewsletterMail')])}}
    <input type="email" name="email" placeholder="email@example.com" id="email_newsletter">
    <input type="submit" name="submit" value="Subscribe" id="submit" class="btn btn-orange">
    {{Form::close()}}
</div>
