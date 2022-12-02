@extends('layout')

@section('controller')
    
<div class="container content">  
    <form id="create-form" method="POST" action="{{route('store.io')}}">
        <div class="alert" style="margin-top:10px">
            @if (session('success'))
            <div class="alert alert-success">
               {{ session('status') }}
             </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            @endif
        </div>
        @csrf
        <div class="row">
            <div class="col-auto">
      <h3>Create Todo</h3>
      <fieldset>
          <label for="" class="mt-3">Title</label>
          <input placeholder="title of todo" type="text" name="title">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="date">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          <textarea placeholder="Target description" name="description" tabindex="5"></textarea>
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


 