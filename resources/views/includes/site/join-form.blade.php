<form action="{{ url('join-form') }}"
      method="post">
    {{ csrf_field() }}

    <input type="hidden" value="{{ $_GET['type'] }}" name="subject">
    <input type="hidden" value="{{ $_GET['classType'] }}" name="classType">
    <input type="hidden" value="{{ $_GET['className'] }}" name="className">

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

    @if($_GET['classType'] >= 0)

        <div class="form-group">
            <label for="">Your Level</label>
            <select id="" name="class_level" class="form-control">
                <option value="0">- Please Select -</option>
                @foreach($classLevels as $level)
                    <option value="{{ $level->id }}">
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

    @endif

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