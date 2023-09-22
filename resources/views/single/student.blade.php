@extends("layout.layout")
@section("sidebar")
    <a class="btn btn-primary mb-4" href="/students">Go Homepage</a>
@endsection
@section("content")
    <h3 class="mb-4 mt-5">Student Details:</h3>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th >{{$singledata->id}}</th>
          </tr>
          <tr>
            <th>Name</th>
            <th >{{$singledata->name}}</th>
          </tr>
          <tr>
            <th>Email</th>
            <th >{{$singledata->email}}</th>
          </tr>
          <tr>
            <th>Password</th>
            <th >{{$singledata->password}}</th>
          </tr>
        </thead>
    </table>
    <form action="/students/{{$singledata->id}}" method="post">
        @csrf
        @method("delete")
        <button onclick="return confirm('r u sure delete')" class="btn btn-primary mb-4">Delete</button>
    </form>


 @endsection
