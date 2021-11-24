{{ $slot }}

<form action={{ route('site.contact') }} method="post">
    @csrf
    <input name="name" value="{{ old('name') }}" type="text" placeholder="Name" class="{{$class}}">
    @if($errors->has('name'))
        {{ $errors->first('name')}}

    @endif
    <br>
    <input name="phone" value="{{ old('phone') }}" type="text" placeholder="Phone" class="{{$class}}">
    {{ $errors->has('phone') ? $errors->first('phone') : ''}}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$class}}">
    {{ $errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="contact_reasons_id" class="{{$class}}">
        <option value="">What is the reason for contacting us?</option>
        @foreach ($contact_reasons as $key => $contact_reason)
            <option value="{{$contact_reason->id}}" {{ old('contact_reasons_id') == $contact_reason->id ? 'selected' : '' }}">{{$contact_reason->contact_reason}}</option>
            
        @endforeach
    </select>
    {{ $errors->has('contact_reasons_id') ? $errors->first('contact_reasons_id') : ''}}
    <br>
    <textarea name="message" class="{{$class}}">@if(old('message') != ''){{ old('message')}}@else Your message goes here @endif</textarea>
    {{ $errors->has('message') ? $errors->first('message') : ''}}
    <br>
    <button type="submit" class="{{$class}}">SEND</button>
</form>
