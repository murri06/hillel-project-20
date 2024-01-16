<x-layout>
    <h2>Creating new event</h2>
    <form method="post" style="max-width: 30vw">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">
                Please, give title for the event
            </label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                   @if(isset($event)) value="{{$event->title}}" @endif>

        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">
                Please, add some notes for the event
            </label>
            <input type="text" name="notes" id="notes" class="form-control" placeholder="Notes"
                   @if(isset($event)) value="{{$event->notes}}" @endif>
        </div>

        <div class="mb-3">
            <label class="form-label" for="user_id">Select responsible user from list </label>
            <select name="user_id" id="user_id" class="form-select">
                <option selected>. . .</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dt_start" class="form-label">
                Select start date
            </label>
            <input type="date" name="dt_start" id="date_start" class="form-select"
                   @if(isset($event)) value="{{$event->dt_start}}" @endif>
        </div>

        <div class="mb-3">
            <label for="dt_end" class="form-label">
                Select start date
            </label>
            <input type="date" id="dt_end" name="date_end" class="form-select"
                   @if(isset($event)) value="{{$event->dt_end}}" @endif>
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
