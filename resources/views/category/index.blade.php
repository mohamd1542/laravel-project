@extends('category.layout')

@section('content')


<div class="jumbotron container">

    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('categories.create')}}" role="button">Create  </a>
  </div>


  <div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
      @endif

  </div>


  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>

            <th scope="col">Category name</th>
            <th scope="col" style="width: 400px">Actions</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($categories as $item)
            <tr>

                <td>{{ $item->name }}</td>
                <td>

                    <div class="row">
                        <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('categories.edit',$item->id)}}"> Edit </a>

                        </div>
{{--                        <div class="col-sm">--}}
{{--                            <a  class="btn btn-primary" href="{{ route('categories.show',$item->id)}}"> Show</a>--}}

{{--                        </div>--}}

                        <div class="col-sm">
                            <form action="{{ route('categories.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete</button>
                            </form>
                        </div>


                    </div>


                </td>
              </tr>
            @endforeach

        </tbody>
      </table>

  </div>

@endsection
