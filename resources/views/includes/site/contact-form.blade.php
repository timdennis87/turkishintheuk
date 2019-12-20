<form action="{{ url('contact-form/submit') }}"
      method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">
            Your Name
        </label>
        <input type="text"
               class="form-control"
               id="name"
               name="name"
               placeholder="Enter your name">
    </div>

    <div class="form-group">
        <label for="email">
            Your Email
        </label>
        <input type="text"
               class="form-control"
               id="email"
               name="email"
               placeholder="Enter your email">
    </div>

    <div class="form-group">
        <label for="phone_number">
            Your Phone Number
        </label>
        <input type="text"
               class="form-control"
               id="phone_number"
               name="phone_number"
               placeholder="Enter your phone number">
    </div>

    <div class="form-group">
        <label for="body">
            Message
        </label>
        <textarea class="form-control"
                  id="body"
                  name="body"
                  rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success px-5 shadow">Send Message</button>

</form>