


  @extends('layouts.master')

  @section('css')
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
  @endsection
  
  @section('title')
   Admin | Category
  @endsection
  
  @section('content')
  
  
   <!-- Header -->
   <div class="header bg-warning pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Category</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Datatables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#insertModal">Create MainCategory</button>
              <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#insertsubModal">Create SubCategory</button>
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
        <div class="col-md-10">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Main Category</h3>
              <p class="text-sm mb-0 myanmar">
               
              </p>
            </div>
            <div class="table-responsive py-4">
              <table id="myTable" class="table table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th width='50%'>Name</th>
                      <th>Photo</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
  
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
          <div class="card">
            <!-- Card header -->
            <div class="card-header gb-primary">
              <h3 class="mb-0">Sub Category</h3>
              <p class="text-sm mb-0 myanmar">
               
              </p>
            </div>
            <div class="table-responsive py-4">
              <table id="mySubTable" class="table table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th width='50%'>Name</th>
                      <th>Photo</th>
                      <th></th>
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
          <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="insert_form" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" name="name" id="recipient-name" required>
              </div>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Photo:</label>
                <input type="file" class="form-control" name="photo" id="recipient-photo" multiple required>
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
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="update_form">
          <div class="modal-body">
            <input type="hidden" id="modal-id" name="id">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Update Category:</label>
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


    {{-- Modal Box --}}
    <div class="modal fade" id="insertsubModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Sub Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="insert_subform" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Name:</label>
                  <input type="text" class="form-control" name="name" id="recipient-name" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Choose MainCategory:</label>
                  <select name="main_category_id" id="recipient-name" class="form-control">
                    @foreach ($main_categories as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                  </select>
                </div>

            </div>

            <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Photo:</label>
                  <input type="file" class="form-control" name="photo" id="recipient-photo" multiple required>
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

        var ts=$('#mySubTable').DataTable({
          // "paging":   false,
          "ordering": false,
          "info":     false
        });

        load_data();
        load_sub_data();
        
        function load_data(){
          // var getAll_url = 'http://localhost/shop/public/api/maincategories';
          var getAll_url = domain+'api/maincategories';
          axios.get(getAll_url,{
            headers: {
              Authorization: TokenData.get()
            }
          })
          .then(response=>{
            // console.log(response['data']);
            var arr = response['data'];
            console.log(arr);
            // console.log(response);
            // var arr = response['data']['data'];
            var tbody = document.getElementById('tbody');
            var no = 1;
            t.clear().draw();
            arr.forEach(element=>{
              t.row.add([
                  `${no++}`,
                  `${element.name}`,
                  `<img src='${element.photo}' style='width:100px;height:100px;'>`,
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

        function load_sub_data(){
          // var getAll_url = 'http://localhost/shop/public/api/maincategories';
          var getAll_url = domain+'api/subcategories';
          axios.get(getAll_url,{
            headers: {
              Authorization: TokenData.get()
            }
          })
          .then(response=>{
            // console.log(response['data']);
            var arr = response['data'];
            console.log(arr);
            // console.log(response);
            // var arr = response['data']['data'];
            var tbody = document.getElementById('tbody');
            var no = 1;
            ts.clear().draw();
            arr.forEach(element=>{
              ts.row.add([
                  `${no++}`,
                  `${element.name}`,
                  `<img src='${element.photo}' style='width:100px;height:100px;'>`,
                  `
                  <button class="btn btn-sm btn-danger" onclick="delete_sub_data(${element.id})"><span class="fa fa-trash"></span></button>
                  `
              ]).draw(false);
              // <input type="button" class="btn btn-warning" value="Edit" onclick="update_modal({
                  //     id: '${element.id}',
                  //     name : '${element.name}'
                  //   })">
            })
          })
          .catch(error=>console.log(error));
        }

        delete_data=function(id){
          if(confirm('Are you sure want to delete!')==true){
            var delete_url = domain+'api/maincategories/'+id;
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
        }

        delete_sub_data=function(id){
          if(confirm('Are you sure want to delete!')==true){
            var delete_url = domain+'api/subcategories/'+id;
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
                load_sub_data();
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
              axios.post(domain+'api/maincategories',form,{
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


            document.getElementById('insert_subform').addEventListener('submit',()=>{
              event.preventDefault();
              var form=new FormData(document.getElementById('insert_subform'));
              axios.post(domain+'api/subcategories',form,{
                headers: {
                  Authorization:TokenData.get()
                }
              })
              .then(res=>{
                load_sub_data();
                $('#insertsubModal').modal('hide');
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
              axios.post(domain+'api/maincategories/update/'+form.get('id'),form,{
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