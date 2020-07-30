@extends('layouts.master');
@section('title')
@endsection

@section('content')
<div class="main-content" id="panel">
 
  <!-- Header -->
  <!-- Header -->
  <div class="container"><br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-transparent border-0">
            <div class="row">
              <div class="col-md-4">
                <h3 class="text mb-0">
                  Users
                </h3>
              </div>              
            </div>
          </div>
          <div class="card-body">
            <table class="table align-items-center table-flush table-striped table-responsive" id="myTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Township</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="tbody">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="update_form" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="modal-id" name="id">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" name="name" id="modal-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="modal-email">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Phone:</label>
                <input type="text" class="form-control" name="phone" id="modal-phone" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Address:</label>
                <input type="text" class="form-control" name="address" id="modal-address">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Choose Township:</label>
                <select name="township_id" class="form-control" id="modal-township_id" required>
                    {{-- @foreach ($township as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach --}}                 
                </select> 
              </div>
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script>

    $(document).ready( function () {
      var t=$('#myTable').DataTable({
        //"paging":   false,
        "ordering": false,
        "info":     false
      });

      load_data();
      function load_data(){
        var getAll_url = domain+'api/users';
        console.log(getAll_url);
        axios.get(getAll_url,{
          headers: {
            Authorization: TokenData.get()
          }
        })
        .then(response=>{
          // console.log(response['data']['data']);
          console.log(response.data.data);
          var arr = response['data']['data'];
          var tbody = document.getElementById('tbody');
          var no = 1;
          t.clear().draw();
          arr.forEach(element=>{
            t.row.add([
                    `${no++}`,
                    `${element.users_data[0].email}`,
                    `${element.name}`,
                    `${element.phone}`,
                    `${element.address}`,
                    `${element.township.name}`,
      
                    `
                   
                     
                 <button class="btn btn-sm btn-danger" onclick="delete_data(${element.id})"><span class="fa fa-trash"></span></button>
                  
                   
                    
                      `
                ]).draw(false);
          });

        })
        .catch(error=>console.log(error));
      }

 // <button class="btn btn-info btn-sm" onclick="update_modal({
                      //   id: '${element.id}',
                      //     email: '${element.users_data[0].email}',
                      //     name : '${element.name}',
                      //     phone : '${element.phone}',
                      //     address : '${element.address}',
                      //     township : '${element.township_id}'
                      //   })"><span class="fa fa-edit"></span></button>
      delete_data=function(id){
        if(confirm('Are you sure want to delete!')==true){
          var delete_url = domain+'api/users/'+id;
          axios.delete(delete_url,{
                headers: {
                  Authorization: TokenData.get()
                }
              })
          // alert(delete_url);
          .then(response=>{
            // console.log(response['data']['data']);
            if(response.data.status == 'success'){
              swal("Congratulation!", "Delete Successful!" , 'success');
              load_data();
            }
          })
          .catch(error=>console.log(error));
        }else{
          return false;
        }
      };

      update_modal=function(data){
        console.log(data);
        // $('#modal-id').val(data.id);
        // $('#modal-name').val(data.name);
        document.getElementById('modal-id').value=data.id;
        document.getElementById('modal-email').value=data.email;
        document.getElementById('modal-name').value=data.name;
        document.getElementById('modal-phone').value=data.phone;
        document.getElementById('modal-address').value=data.address;
        document.getElementById('modal-township_id').value=data.township_id;
        // document.getElementById('modal-photo').value=data.photo;
        $('#editModal').modal('show');
      }

      document.getElementById('update_form').addEventListener('submit',()=>{
        event.preventDefault();
        var form=new FormData(document.getElementById('update_form'));
        axios.post(domain+'api/users/update/'+form.get('id'),form,{
          headers: {
            Authorization: TokenData.get()
          }
        })
        .then(res=>{
          load_data();
          $('#editModal').modal('hide');
        })
        .catch(err=>console.log(err));
      });

    });
  </script>
  
@endsection