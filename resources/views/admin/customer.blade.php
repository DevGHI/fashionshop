@extends('layouts.master')
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
                  Customers
                </h3>
              </div>              
            </div>
          </div>
          <div class="card-body">
            <table class="table align-items-center table-flush table-striped table-responsive" id="myTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th width="20%">Detail</th>
                  <th>Sub Category</th>
                  <th>Photo</th>
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
        var getAll_url = domain+'api/products/';
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
                    `${element.detail}`.substr(0,100),
                    `${element.subcategory.name}`,
                    `<img src='${element.photo[0].photo_url}' style='width:100px;height:100px;'>
                    <a href="{{url('product_detail/${element.id}')}}"><button type="" class="btn btn-">Detail</button><a>`,
                    `
                    <input type="button" class="btn btn-warning" value="Edit" onclick="update_modal({
                          id: '${element.id}',
                          name : '${element.name}',
                          price : '${element.price}',
                          detail : '${element.detail}',
                          sub_category_id : '${element.sub_category_id}'
                        })">
                      <input type="button" class="btn btn-danger" value="Delete" onclick="delete_data(${element.id})">
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