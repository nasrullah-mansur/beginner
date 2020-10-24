@extends('admin.index')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-item-center">
            <strong class="card-title m-0">Data Table</strong>
         
              <!-- <a href="#" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#defaultModal">Add</a> -->
              @can('add-post')
              <a href="{{route('post.create')}}" type="button" class="btn btn-primary float-right" >Add Post</a>
              @endcan
              
          
        
        </div>
        <div class="card-body">

  <table id="tbody" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Post Title</th>
        <th>Description</th>
        <th>Category</th>
        @can('add-post')
        <th>Created at</th>
        @endcan
        <th></th>
      </tr>
    </thead>
    <tbody id="tbody">
      
      @forelse($post as $post)
      <tr class="mt">
        <td class="id" style="display: none;">{{$post->id}}</td>
        <td>{{$loop->iteration}}</td>
        <td class="title">{{$post->title}}</td>
        <td class="desc">{{$post->description}}</td>
        <td>
        @foreach($post->category as $category)
          {{$category->name}} <br>
        @endforeach
        </td>
        @can('add-post')
        <td>{{$post->created_at ? $post->created_at->diffForHumans() : 'no time found'}}</td>
        @endcan
        <td width="18%">
            <a href="" type="button" class="btn btn-primary save" data-toggle="modal" data-target="#defaultModal">Edit</a>
            
            <a href="{{route('post.delete', $post->id)}}" onclick="return confirm('Are you sure want to delete?')" type="button" class="btn btn-danger">Delete</a>
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


<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Add Blog</h4>
            </div>
      
            
              <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control timepicker m-title" placeholder="Please input title...">
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <textarea rows="4" name="description" class="form-control no-resize m-desc" placeholder="Please input description..."></textarea>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-default btn-round waves-effect" >SAVE CHANGES</button>
                  <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
              </div>
            </form>
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
