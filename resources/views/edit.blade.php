@extends('layout')

@section('controller')
    
<div class="container content">  
    <form id="create-form" method="POST" action="/update/{{$todo->id}}">
        <div class="alert" style="margin-top:10px">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
                @endforeach
            </ul>
            @if (session('successUpdate'))
            <div class="alert alert-success">
                {{ session('successUpdate') }}
            </div>
            @endif
        </div>
    </div>
        @endif
        <div class="row" style="margin-top: 50px">
            <div class="col-auto">
      <h3>Edit Todo</h3>
      <fieldset>
          <label for="">Title</label>
          {{-- atribute value fungsinya untuk memasukan data ke input--}}
          {{-- kenapa datanya harus disimpan di input? karena ini kan fitur edit. Kalau 
            fitur edit belum tentu semua data column diubah. Jadi untuk mengantisipasi 
            hal itu, tampilin dulu semua data di inputnya baru nantinya pengguna yang 
            menentukan data input sama yang mau diubah--}}
        {{--karna di route nya pake method patch
            sedangkan attribute method di form cuman bisa post/get. Jadi yang post nya ditimpa--}}
        @method('PATCH')
        @csrf
          <input placeholder="title of todo" type="text" name="title" value="{{$todo->title}}">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="date" value="{{$todo->date}}">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          {{-- karena textarea tidak termasuk tag input, untuk--}}
          <textarea placeholder="Type your description here....." name="description" tabindex="5">{{$todo->description}}</textarea>
      </fieldset>
      <fieldset>
          <button type="submit" id="contactus-submit">Submit</button>
      </fieldset>
      <fieldset>
          <a href="/dashboard" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
    </form>
</div>
</div>
</div>
@endsection


 