@extends("layout.layout")


@section("sidebar")
    <a class="btn btn-primary" href="/students">Go Homepage</a>
@endsection

@section("content")
<form action="/students/{{$editdata->id}}" method="post">
    @if (isset($editdata->id))
     @method("put")
    @endif

    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">User Name:</label>
      <input type="text" value="{{old("name",$editdata->name)}}" name="name" class="form-control" id="name">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">User Email:</label>
        <input type="email" value="{{old("email",$editdata->email)}}"  name="email" class="form-control" id="email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">User Password:</label>
        <input type="password" value="{{old("password",$editdata->password)}}"  name="password" class="form-control" id="password">
      </div>

    <button type="submit" class="btn btn-primary mb-4">Submit</button>
  </form>

@endsection
