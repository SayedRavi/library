<div class="row">
    <div class="col s12 center">
        <span style="display: inline-block; width: 100px; height: 100px; overflow: hidden; border-radius: 50%; border: 1px solid @error('profile') red @else black @enderror;">
            <img src="{{isset($adminuser)?asset('storage/'.$adminuser->profile):asset('img/user.png')}}" id="profile_preview" width="100%" alt="">
        </span><br>
        <label for="profile" class="btn waves-effect btn-small btn-floating z-depth-0 transparent" type="button">
            <i class="material-icons black-text">edit</i>
        </label>
        <input type="file" name="profile" id="profile" accept="image/*" id="profile" style="width: 0; height: 0;">
        @error('profile')
        <blockquote>
            {{$message}}
        </blockquote>
        @enderror
    </div>
    <div class="col s12 m6 input-field ">
        <input type="text" name="name" id="name" value="{{$adminuser->name??old('name')}}" class=" @error('name') invalid @enderror">
        <label for="name">Name</label>
        @error('name')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 m6 input-field ">
        <input type="text" name="last_name" id="last_name" value="{{$adminuser->last_name??old('last_name')}}" class=" @error('last_name') invalid @enderror">
        <label for="last_name">Last Name</label>
        @error('last_name')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>

    <div class="col s12 m4 input-field ">
        <i class="material-icons prefix">email</i>
        <input type="email" name="email" id="email"@if(isset($adminuser->email)) disabled @endif value="{{$adminuser->email??old('email')}}" class=" @error('email') invalid @enderror">
        <label for="email">email</label>
        @error('email')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>

    <div class="col s12 m4 input-field ">
        <i class="material-icons prefix">phone</i>
        <input type="tel" name="phone" id="phone" value="{{$adminuser->phone??old('phone')}}" class=" @error('phone') invalid @enderror">
        <label for="phone">Phone</label>
        @error('phone')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>

    <div class="col s12 m4 input-field ">
        <i class="material-icons prefix">location_on</i>
        <input type="text" name="address" id="address" value="{{$adminuser->address??old('address')}}" class=" @error('address') invalid @enderror">
        <label for="address">Address</label>
        @error('address')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 m6 input-field">
        <select name="role" id="role" class="browser-default select">
            <option name="admin" value="admin">Admin</option>
            <option name="user" value="user">User</option>
        </select>
    </div>
    <div class="col s12 m6 input-field ">
        <input type="password" name="password" id="password" value="{{$adminuser->password??old('password')}}" class=" @error('password') invalid @enderror">
        <label for="password">password</label>
        @error('password')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
{{--    <div class="col s12 m6 input-field ">--}}
{{--        <input type="password" name="c_password" id="c_password" value="{{$adminuser->c_password??old('c_password')}}" class=" @error('c_password') invalid @enderror">--}}
{{--        <label for="c_password">Confirm password</label>--}}
{{--        @error('c_password')--}}
{{--        <blockquote>{{$message}}</blockquote>--}}
{{--        @enderror--}}
{{--    </div>--}}
</div>

@push('js')
    <script>
        $("input[type='file']").on('change',function (){
            ar.changeImage(this);
        })
    </script>
@endpush
