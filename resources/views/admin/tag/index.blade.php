@extends('admin.index')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-item-center">
            <strong class="card-title m-0">Data Table</strong>
         
              <!-- <a href="#" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#defaultModal">Add</a> -->
              
              <a href="{{route('tag.create')}}" type="button" class="btn btn-primary float-right" >Add Tag</a>

             
        </div>
        @if(Session::has('success'))
              <p>{{Session('success')}}</p>
            @endif
        @if(Session::has('update'))
              <p>{{Session('update')}}</p>
            @endif
        <div class="card-body">

  <table id="tbody" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>tag Name</th>
        <th>Created at</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="tbody">
      
      @forelse($tag as $cat)
      <tr class="mt">
        <td>{{$loop->iteration}}</td>
        <td class="title">{{$cat->name}}</td>
        <td>{{$cat->created_at ? $cat->created_at->diffForHumans() : 'no time found'}}</td>
        <td width="18%">
            <a href="{{route('tag.edit', $cat->name)}}" type="button" class="btn btn-primary save">Edit</a>
            
            <form action="{{route('tag.destroy', $cat->name)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</button>
            </form>
          </td>
      </tr>
      @empty
        <tr>
        <td>NO data found</td>
        </tr>
      @endforelse
    </tbody>
  </table>
        </div>
    </div>
</div>



@endsection


@push('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


    <script>
        $(document).ready(function() {
        $('#post').DataTable();
  });
   

 
    </script>



@endpush
