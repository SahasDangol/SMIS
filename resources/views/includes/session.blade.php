<div class="input-group no-border">
    <select class="select2" onchange="changeSession(this);" name="academic_session" id="academic_session">
        @foreach(get_academic_session() as $session)
            <option value="{{$session->id}}"
            @if($session->working_status==1)
                selected
            @endif
            >{{$session->year}}</option>
        @endforeach
    </select>
</div>
