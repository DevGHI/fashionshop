@extends('layouts.master')
@section('title')
Admin | Township
@endsection

@section('content')
<div class="main-content" id="panel">
  <!-- Topnav -->
     <!-- Header -->
     <div class="header bg-warning pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Townships</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Datatables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#insertModal">Create</button>
              {{-- <a href="#" class="btn btn-sm btn-neutral">New</a> --}}
              {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Townships</h3>
              <p class="text-sm mb-0 myanmar">
                
              </p>
            </div>
            <div class="table-responsive py-4">
              <table id="myTable" class="table table-flush">
                <thead>
                  <tr>
                    <th>No</th>
                    <th width='50%'>Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                  <tbody>
  
                  </tbody>
              </table>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  
  
  
  
















  {{-- Modal Box --}}
  <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Township</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="insert_form">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Add Township:</label>
                <input type="text" class="form-control" name="name" id="recipient-name">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  {{-- Update Modal --}}
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Township</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="update_form">
          <div class="modal-body">
            <input type="hidden" id="modal-id" name="id">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Update Township:</label>
                <input type="text" class="form-control" name="name" id="modal-name">
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
    <!-- Footer -->
    {{-- @include('layouts.footer') --}}
@endsection

@section('js')
  <script>
    $(document).ready( function () {
        var t=$('#myTable').DataTable({
          // "paging":   false,
          "ordering": false,
          "info":     false
        });

        load_data();
        
        function load_data(){
          var getAll_url = domain+'api/townships';
          axios.get(getAll_url,{
            headers: {
              Authorization: TokenData.get()
            }
          })
          .then(response=>{
            // console.log(response);
            var arr = response['data']['data'];
            console.log(arr);
            var tbody = document.getElementById('tbody');
            var no = 1;
            t.clear().draw();
            arr.forEach(element=>{
              t.row.add([
                  `${no++}`,
                  `${element.name}`,
                  `
                  <button class="btn btn-info btn-sm" onclick="update_modal({
                          id: '${element.id}',
                          name : '${element.name}'
                        })"><span class="fa fa-edit"></span></button>
                 <button class="btn btn-sm btn-danger" onclick="delete_data(${element.id})"><span class="fa fa-trash"></span></button>
                  
                   
                  
                  `
              ]).draw(false);
            })
          })
          .catch(error=>console.log(error));
        }

        delete_data=function(id){
          if(confirm('Are you sure want to delete!')==true){
            var delete_url = domain+'api/townships/'+id;
            axios.delete(delete_url,{
              headers: {
                Authorization: TokenData.get()
              }
            })
            // alert(delete_url);
            .then(response=>{
              console.log(response);
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

        document.getElementById('insert_form').addEventListener('submit',()=>{
              event.preventDefault();
              var form=new FormData(document.getElementById('insert_form'));
              axios.post(domain+"api/townships",form,{
                headers: {
                  Authorization:TokenData.get()
                }
              })
              .then(res=>{
                load_data();
                $('#insertModal').modal('hide');
              })
              .catch(err=>console.log(err));
            });

        update_modal=function(data){
          console.log(data);
          // $('#modal-id').val(data.id);
          // $('#modal-name').val(data.name);
          document.getElementById('modal-id').value=data.id;
          document.getElementById('modal-name').value=data.name;
          $('#editModal').modal('show');
        }

        document.getElementById('update_form').addEventListener('submit',()=>{
              event.preventDefault();
              var form=new FormData(document.getElementById('update_form'));
              axios.post(domain+"api/townships/update/"+form.get('id'),form,{
                headers: {
                  Authorization:TokenData.get()
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