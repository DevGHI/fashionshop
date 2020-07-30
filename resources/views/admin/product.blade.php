




@extends('layouts.master')
@section('title')
Admin | Products
@endsection

@section('content')


  
   <!-- Header -->
   <div class="header bg-warning pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
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
            <h3 class="mb-0">Products</h3>
            <p class="text-sm mb-0 myanmar">
              
            </p>
          </div>
          <div class="table-responsive py-4">
            <table id="myTable" class="table table-flush">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Price</th>
                  {{--  <th width="20%">Detail</th>  --}}
                  <th>Sub Category</th>
                  <th>Photo</th>
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
          <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
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
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Price:</label>
                <input type="number" class="form-control" name="price" id="recipient-price" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Detail:</label>
                
                <textarea name="detail" id="recipient-detail" cols="30" rows="10" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Choose Category:</label>
                <select name="sub_category_id" class="form-control" required>
                  @foreach ($subcategories as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Choose Color:</label><br>
                {{-- <select name="color_id" class="form-control" required>
                  @foreach ($colors['data'] as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                  @endforeach
                  
                </select> --}}
                @foreach($colors['data'] as $item)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $item['name'] }}" value="{{ $item['name'] }}" name="color_name[]">
                  <label class="form-check-label" for="inlineCheckbox{{ $item['name'] }}">{{ $item['name'] }}</label>
                </div>
                @endforeach
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Choose Size:</label>
               <br>
                  @foreach($sizes['data'] as $item)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $item['name'] }}" value="{{ $item['name'] }}" name="size_name[]">
                    <label class="form-check-label" for="inlineCheckbox{{ $item['name'] }}">{{ $item['name'] }}</label>
                  </div>
                  @endforeach
              </div>

              <div class="form-group">
                {{-- <label for="photo" class="btn btn-primary btn-sm"><i class="fa fa-photo"></i>Choose Photos
                  <input type="file" multiple id="photo" name="photo[]" value="Add"  class="button-small text-muted" style="width: 0px; height: 0px; overflow: hidden;">
                </label>
                <div id="gallery"></div> --}}
                {{-- <div id="preview" style="margin: 10px;"></div> --}}
                <input id="browse" multiple class="button-small text-muted" name="photo[]" type="file" value="Add" accept="image/*">
                
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
                <label for="recipient-name" class="col-form-label">Price:</label>
                <input type="number" class="form-control" name="price" id="modal-price" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Detail:</label>
                <input type="text" class="form-control" name="detail" id="modal-detail">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Choose Category:</label>
                <select name="sub_category_id" class="form-control" id="modal-sub_category_id"required>
                  @foreach ($subcategories as $item)
                  <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                  @endforeach
                  
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

    function previewFiles() {
      var preview = document.querySelector('#preview');
      var files   = document.querySelector('input[type=file]').files;

      function readAndPreview(file) {
        // Make sure `file.name` matches our extensions criteria
        if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
          var reader = new FileReader();
          reader.addEventListener("load", function () {
            var image = new Image();
            image.height = 100;
            image.title = file.name;
            image.src = this.result;
            preview.appendChild( image );
          }, false);
          reader.readAsDataURL(file);
        }
      }
      if (files) {
        [].forEach.call(files, readAndPreview);
      }
    }

    $(document).ready( function () {
      var t=$('#myTable').DataTable({
        //"paging":   false,
        "ordering": false,
        "info":     false
      });

      load_data();
      function load_data(){
        var getAll_url = domain+'api/products';
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
                    `${element.name}`,
                    `${element.price}`,
                    `${element.subcategory.name}`,
                    `<img src='${element.photo[0].photo_url}' style='width:100px;height:100px;'>`,
                    `
                    <a href="{{url('product_detail/${element.id}')}}"><button type="" class="btn btn-sm btn-primary">Detail</button><a>
                      <button class="btn btn-info btn-sm" onclick="update_modal({
                          id: '${element.id}',
                          name : '${element.name}',
                          price : '${element.price}',
                          sub_category_id : '${element.sub_category_id}'
                        })"><span class="fa fa-edit"></span></button>
                 <button class="btn btn-sm btn-danger" onclick="delete_data(${element.id})"><span class="fa fa-trash"></span></button>
                  
                   
                   
                      `
                ]).draw(false);
          });

        })
        .catch(error=>console.log(error));
      }


      delete_data=function(id){
        if(confirm('Are you sure want to delete!')==true){
          var delete_url = domain+'api/products/'+id;
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

      document.getElementById('insert_form').addEventListener('submit',()=>{
        event.preventDefault();
        var form=new FormData(document.getElementById('insert_form'));
        console.log(form.get('name'));
        axios.post(domain+"api/products",form,{
          headers: {
            Authorization: TokenData.get()
          }
        })
        .then(res=>{
          console.log('res->');
          console.log(res.data);
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
        document.getElementById('modal-price').value=data.price;
        document.getElementById('modal-detail').value=data.detail;
        document.getElementById('modal-sub_category_id').value=data.sub_category_id;
        // document.getElementById('modal-photo').value=data.photo;
        $('#editModal').modal('show');
      }

      document.getElementById('update_form').addEventListener('submit',()=>{
        event.preventDefault();
        var form=new FormData(document.getElementById('update_form'));
        axios.post(domain+'api/products/update/'+form.get('id'),form,{
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