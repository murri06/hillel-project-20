<x-layout>
    <form method="post" style="max-width: 30vw">
        @csrf
        <div class="col-3">
            <label for="name" class="form-label">
                Please, write your Full name
            </label>
            <input type="text" name="name" id="name"
                   @if(isset($user)) value="{{$user->name}}" @endif>
        </div>

        <div class="col-3">
            <label for="email" class="form-label">
                Provide an email
            </label>
            <input class="form-input" type="text" name="email" id="email"
                   @if(isset($user)) value="{{$user->email}}" @endif>
            @if(isset($_GET['errNo']))
                <br><br>
                <span class="alert alert-danger">Email address is taken!</span>
            @endif
        </div>

        <div class="col-3">
            <label class="form-label" for="password"><br>
                Type a password
            </label>
            <input type="password" name="password" id="password">
        </div><br>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-secondary" style="margin-top: 20px">Submit</button>
    </form>
</x-layout>
