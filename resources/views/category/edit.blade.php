@extends('category.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">

          <p class="card-text">  <span><a href="{{ route('categories.index')}}"> back</a> </span>  Category name : {{ $category->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('categories.update', $category->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $category->name  }} " class="form-control"  placeholder="category name">
        </div>

{{--        <div class="form-group">--}}
{{--            <label for="browser">Choose your browser from the list:</label>--}}
{{--            <input list="browsers" name="category_id" id="browser">--}}

{{--            <datalist id="browsers">--}}
{{--                @foreach($categories as $x)--}}
{{--                    <option value="{{$x->id}}">{{$x->name}}</option>--}}
{{--                @endforeach--}}

{{--            </datalist>--}}
{{--        </div>--}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>

        </div>



    </form>
</div>





@endsection
