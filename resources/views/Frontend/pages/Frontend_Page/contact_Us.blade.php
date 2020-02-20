<div id="contact_us">
    <div id="left_side_of_contact">


        <h5>Kontakt</h5>
        <div id="contact_us_form">
            <form action="{{ url('/contact') }}">
                <input type="email" name="email" placeholder="Email" class="contact_input">
                <input type="text" name="predmet" placeholder="Predmet" class="contact_input">
                <textarea name="text" id="" cols="30" rows="10" placeholder="Text..."></textarea>
                <input type="submit" name="submit_contact" id="submit_contact" value="Odoslať" class="btn btn-orange btn-lg my-3">
            </form>

        </div>
    </div>
    <div id="right_side_of_contact">
        <div id="map">

        </div>
        <div id="contact_information">
            <p><i class="fas fa-phone-square" style="{font-size: 17px; color: #FCAD0E;}"></i>+421 911 369 365</p>
            <p><i class="fas fa-map-marker-alt" style="{font-size: 17px; color: #FCAD0E;}"></i>Plzenská 1, Prešov</p>

        </div>
    </div>

</div>
