<div class="row">
    <div class="container">
                <div class="input-field col s12">


                    <select name="category" class=" @error('select') invalid @enderror">
                    <option  class="disabled selected" disabled></option>
                    @foreach($categories as $category)
{{--                            {{$category->title == $book->cat_name ? 'selected' : ''}}--}}
                    <option name="category" value="{{$category->title}}" >{{$category->title}}</option>
                    @endforeach
                </select>
                    @error('select')
                    <blockquote>{{$message}}</blockquote>
                    @enderror
                </div>

                <div class="col s12 input-field">
                        <input type="text" name="title" id="title" class="@error('title') invalid @enderror" value="{{$userbook->title??old('title')}}">
                        <label for="title">Title</label>
                        @error('title')
                        <blockquote>{{$message}}</blockquote>
                        @enderror
                </div>
        <div class="col s12 input-field">

            <ul class="collapsible">
            <li>
                <div class="collapsible-header"><i class="material-icons">D</i>Add Details</div>
                <div class="collapsible-body"><span>
                        <textarea name="detail" id="detail" cols="30" rows="10">{{$userbook->detail??old('detail')}}</textarea>
                    </span></div>
            </li>
        </ul>
        </div>

    </div>
</div>
<div class="container">
    <div class="file-field input-field">
        <div class="btn">
            <span>Image</span>
            <input type="file" accept="image/*" name="photo" value="{{isset($userbook)?asset('storage/'.$userbook->photo):old('photo')}}">
        </div>
        <div class="file-path-wrapper @error('photo') invalid @enderror">
            <input class="file-path validate" name="photo" id="photo" accept="image/*"
                   placeholder="Upload File"
                   value="{{isset($userbook)?asset('storage/'.$userbook->photo):old('photo')}}">
        </div>
        <div style="width: 100px; height: 100px; overflow: hidden;">
            <img src="{{isset($userbook)?asset('storage/'.$userbook->photo):old('photo')}}" width="100%" alt="">
        </div>
        @error('photo')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>PDF File</span>
                <input type="file" name="file" value="{{isset($userbook)?asset('storage/'.$userbook->file):old('file')}}">
{{--                {{isset($book)?asset('storage/'.$book->file):''}}--}}
            </div>
            <div class="file-path-wrapper @error('file') invalid @enderror">
                <input class="file-path validate" name="file" id="file" placeholder="Upload File" value="{{isset($userbook)?asset('storage/'.$userbook->file):old('file')}}">
            </div>
            @error('file')
            <blockquote>{{$message}}</blockquote>
            @enderror
        </div>
</div>


@push('js')
  <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('plugins/selectize/selectize.js')}}"></script>
  <script>
      $(document).ready(function(){
          $('.collapsible').collapsible();
      });
  </script>
  <script>
      CKEDITOR.replace('detail');
  </script>
  <script>
          $("selectize").selectize({
              create: false,
              sortField: "text",
          });
  </script>
  <script>
      $(document).ready(function(){
          $('select').formSelect();
      });

  </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('plugins/selectize/selectize.css')}}">
@endpush
