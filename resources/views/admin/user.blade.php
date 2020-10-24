@extends('admin.index')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-item-center">
            <strong class="card-title m-0">Data Table</strong>
         
              <a href="" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#defaultModal">Add</a>
        
        </div>
        <div class="card-body">

  <table id="noman" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created at</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="tbody">
      
      @forelse($users as $user)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td style="display: none">{{$user->id}}</td>
        <td>{{$user->name}}</td>  
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td width="18%">
            <a href="#" type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#defaultModal">Edit</a>
                   
            <a href="" onclick="return confirm('Are you sure want to delete?')" type="button" class="btn btn-danger">Delete</a>
          </td>
      </tr>
      @empty
        <p>No Data found</p>
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
          <form action="" method="POST">
            @csrf
            <div class="modal-body">
              <div class="input-group mb-3">
                  <input type="text" name="name" class="form-control timepicker" placeholder="Please input title...">
              </div>
              <div class="form-group">
                  <div class="form-line">
                      <input name="email" class="form-control no-resize" placeholder="Please input description...">
                  </div>
              </div>
              <div class="form-group">
                  <div class="form-line">
                      <input name="phone" class="form-control no-resize" placeholder="Please input description...">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-round waves-effect save">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
          </form>
      </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

 <script type="text/javascript">
  // document.addEventListener('DOMContentLoaded',function(){
  //     $.ajaxSetup({
  //           headers: {
  //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //           }
  //       });
  // });
  
  let btn = document.getElementsByClassName('save')[0],
      table = document.getElementById('tbody'),
      modal = document.getElementsByClassName('modal'),
      id = '',
      name = '',
      email='',
      phone ='';
      
  btn.addEventListener('click', modalEvent);
  function modalEvent(){
      name  = document.querySelector('input[name=name]').value;
      email = document.querySelector('input[name=email]').value;
      phone = document.querySelector('input[name=phone]').value;
  }

  btn.addEventListener('click', save);
  function save(e){
    e.preventDefault();
    //console.log(e);
    $.ajax({
      url:"{{route('user.update')}}",
      method: 'POST',
      dataType:'JSON',
      data: {
        id: id,
        name: name,
        email: email,
        phone: phone
      }
    }).done(function(response){
      //console.log(response);
    }).fail(function(error){
      let errors = (JSON.parse(error.responseText));

      console.log(errors.errors.name);
    }).always(function(){
      $('#defaultModal').modal('hide');
    })
  }
  table.addEventListener('click', function(e){
    if(e.target.classList.contains('edit')){
      btn.innerHTML = 'Edit Changes';
      id = e.target.parentElement.parentElement.children[1].innerText;
      name = e.target.parentElement.parentElement.children[2].innerText;
      email = e.target.parentElement.parentElement.children[3].innerText;
      phone = e.target.parentElement.parentElement.children[4].innerText;
      document.querySelector('input[name=name]').value = name;
      document.querySelector('input[name=email]').value = email;
      document.querySelector('input[name=phone]').value = phone;
    }
  });
</script>

@endsection