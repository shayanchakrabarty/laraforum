@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Channels</div>

        <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <th>Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>

            <tbody>
              @foreach($channels as $channel)
                <tr>
                  <td>{{ $channel->title }}</td>
                  <td><a href="{{ route('channels.edit', ['channel' => $channel->id ]) }}" class="btn btn-xs btn-primary">EDIT</a></td>
                  <td>
                    <form action="{{ route('channels.destroy', ['channel' => $channel->id ]) }}" method="post">
                      <!-- <a href="{{ route('channels.destroy', ['channel' => $channel->id ]) }}" class="btn btn-xs btn-danger">DESTROY</a></td> -->
                      {{csrf_field()}}

                    {{method_field('DELETE')}}
                      <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                    </form> 
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
