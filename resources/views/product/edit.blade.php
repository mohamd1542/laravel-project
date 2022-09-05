@extends('product.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">

          <p class="card-text">  <span><a href="{{ route('products.index')}}"> back</a> </span>  Product name : {{ $product->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('products.update', $product->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $product->name  }} " class="form-control"  placeholder="product name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  Price</label>
            <input type="text" name="price" value="{{ $product->price  }} "  class="form-control"  placeholder="product price">
          </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">  Image</label>
            <input type="file" name="image" value="{{ $product->image  }} "  class="form-control"  placeholder="product image">
        </div>

    <div class="form-group">
        <label for="browser">Select a category from the items :</label>
        <input list="browsers" name="category_id" id="browser">

        <datalist id="browsers">
            @foreach($categories as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach

        </datalist>
    </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>

        </div>



    </form>
</div>





@endsection
