@extends("layout.layout")


@section("sidebar")
    <a class="btn btn-primary" href="/students/create">Add Student</a>
@endsection

@section("content")
@if (isset($message))
    <div class="alert alert-primary text-capitalize">{{$message}}</div>
@endif
<table class="table mb-5">
    <thead>
      <tr>
        <th>Id</th>
        <th >Name</th>
        <th >Email</th>
        <th >Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($showstudent as $key=>$singlestudent)
        <tr>
            <th>{{$showstudent->firstItem()+$key}}</th>
            <td>{{$singlestudent->name}}</td>
            <td>{{$singlestudent->email}}</td>
            <td>
                <a class="btn btn-primary" href="/students/{{$singlestudent->id}}">View</a>
                <a class="btn btn-success" href="/students/{{$singlestudent->id}}/edit">Edit</a>
            </td>
        </tr>
      @endforeach

    </tbody>

  </table>
  {{$showstudent->links()}}

@endsection
