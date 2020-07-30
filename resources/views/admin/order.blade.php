@extends('layouts.master')
@section('title')
Admin | Order
@endsection

@section('content')

 
   <!-- Header -->
   <div class="header bg-warning pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Order List</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Datatables</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            {{-- <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#insertModal">Create</button> --}}
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
          <div class="card-header bg-transparent border-0">
            <div class="row">
              <div class="col-md-4">
                <h3 class="text mb-0">
                  Order List
              </h3>
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <input type="radio" id='rdo_pending' name="rdo" value="Pending" onclick="change_data('pending')" checked>

                <label for="rdo_pending">Pending</label>


                <input type="radio" id='rdo_accept' name="rdo" value="Accept" onclick="change_data('accept')">
                <label for="rdo_accept">Accept</label>


                <input type="radio" id='rdo_complete' name="rdo" value="Complete" onclick="change_data('complete')">
                <label for="rdo_complete">Complete</label>
              </div>
            </div>
        </div>
          <div class="table-responsive py-4">
            <table id="myTable" class="table table-flush">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Customer</th>
                  <th>Township</th>
                  <th>Order Address</th>
                  <th>Recevie Date</th>
                  {{--  <th>Recevie Time</th>  --}}
                  {{-- <th>Customer</th> --}}
                  <th>Products</th>
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










@endsection

@section('js')
  <script>
    $(document).ready( function () {
        var t=$('#myTable').DataTable({
          "paging":   false,
          "ordering": false,
          "info":     false
        });
        var temp_status='pending';
        change_data=function(status){
          temp_status=status;
          load_data(status);
        }

        load_data('pending');


        function load_data(status){
          var getAll_url = domain+'api/orders?status='+status;
          axios.get(getAll_url,{
            headers: {
              Authorization: TokenData.get()
            }
          })
          .then(response=>{
            // console.log(response);
            var arr = response['data']['data'];
            console.log(arr[0]);
            var tbody = document.getElementById('tbody');
            var no = 1;
            t.clear().draw();
            arr.forEach(element=>{
              let btn= `<a href="{{url('order_detail/${element.id}')}}"><button type="" class="btn btn-sm btn-success">Detail</button><a>&nbsp;&nbsp;`;
              
              if(element.status=='pending')
              btn+=`<input type="button" class="btn btn-sm btn-primary" value="Accept" onclick="change_status({
                id: '${element.id}',
                status:'accept'
              })">`;
              else if(element.status=='accept')
              btn+=`<input type="button" class="btn btn-sm btn-primary" value="Complete" onclick="change_status({
                id: '${element.id}',
                status:'complete'
              })">`;
              btn+=`<input type="button" class="btn btn-sm btn-danger" value="Delete" onclick="delete_data(${element.id})">`
              t.row.add([
                  `${no++}`,
                  `${element.customer_data.name}`,
                  `${element.township.name}`,
                  `${element.address}`,
                  `${element.receive_date}`,
                  {{--  `${element.receive_time}`,  --}}
                  `${element.products_data.length}`,
                  btn
              ]).draw(false);
            })
          })
          .catch(error=>console.log(error));
        }

        change_status=(data)=>{
          axios.post(domain+"api/orders/update/"+data.id,{
                  status:data.status
                },
                {
                headers: {
                  Authorization:TokenData.get()
                }
              })
              .then(res=>{
                load_data(temp_status);
              })
              .catch(err=>console.log(err));
          
        }


        delete_data=function(id){
          if(confirm('Are you sure want to delete!')==true){
            var delete_url = domain+'api/orders/'+id;
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
                load_data(temp_status);
              }
            })
            .catch(error=>console.log(error));
          }else{
            return false;
          }
        };

   });
  </script>
  
@endsection