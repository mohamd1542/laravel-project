@extends('category.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Please create a new category</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('categories.store')}}" method="POST">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" class="form-control"  placeholder="category name">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>

        </div>



    </form>
</div>


@endsection
