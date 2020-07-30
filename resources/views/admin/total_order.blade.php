




@extends('layouts.master')
@section('title')
Admin | OrderReport
@endsection

@section('content')

    
   <!-- Header -->
   <div class="header bg-warning pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Order Report</h6>
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
          <div class="card-header">
            <h3 class="mb-0">Order Report By Product</h3>
           
            <form id="filter_form">
              <input type="hidden" name="status" value="accept">
              <div class="form-row">
                <div class="col">
                  <label for="">Start Date</label>
                  <input type="date" class="form-control" name="start_date" placeholder="Choose Start Date" required>
                </div>
                <div class="col">
                  <label for="">End Date</label>
                  <input type="date" class="form-control" name="end_date" placeholder="Choose End Date" required>
                </div>
                <div class="col" style="padding-top:32px">
                  <input type="submit" class="btn btn-primary" value="Show">
                </div>
              </div>
            </form>
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
                  <th>Quantity</th>
                  <th>TotalAmount</th>
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
    <br><hr><br>
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header bg-transparent border-0">
            <h3 class="text mb-0">
              Order Report By Customer
          </h3>
         
          <form id='user_filter_form'>
            <div class="row">
              <div class="col">
                <label for="date">Choose Date</label>
                <input type="date" class="form-control" name="date" id="date" min="2020-4-1" required>
              </div>
              <div class="col">
                <label for="township">Choose Township</label>
                <select name="township_id" id="township" class="form-control" required>
                  @foreach ($townships['data'] as $item)
                      <option value='{{ $item['id'] }}'>{{ $item['name'] }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col" style="margin-top:5px">
                {{-- <label>Choose Status</label> --}}
                <input type="radio" id='rdo_pending' name="status" value="pending" checked>
                <label for="rdo_pending">Pending</label><br>

                <input type="radio" id='rdo_accept' name="status" value="accept">
                <label for="rdo_accept">Confirm</label><br>

                <input type="radio" id='rdo_complete' name="status" value="complete">
                <label for="rdo_complete">Complete</label>
              </div>
              <div class="col">
                <input type="submit" class="btn btn-primary" value="Show">
              </div>
            </div>
          </form>
              {{-- <div class="col-md-4"></div> --}}
              
            </div>
        </div>
          <div class="table-responsive py-4">
            <table id="userTable" class="table table-flush">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Township</th>
                  {{--  <th>Recevie Time</th>  --}}
                  {{-- <th>Customer</th> --}}
                  <th>OrderID</th>
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
        //"paging":   false,
        "ordering": false,
        "info":     false
      });

      var ut=$('#userTable').DataTable({
        //"paging":   false,
        "ordering": false,
        "info":     false
      });


      document.getElementById('filter_form').addEventListener('submit',()=>{
        event.preventDefault();
        var form=new FormData(document.getElementById('filter_form'));
        axios.post(domain+'api/order_report',form,{
          headers: {
            Authorization: TokenData.get()
          }
        })
        .then(res=>{
            let arr=res.data.data;
            console.log('daa');
            console.log(arr);
            if(arr.length==0){
              Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'No Data',
                showConfirmButton: true,
                // timer: 1500
              })
            }

            var no = 1;
            t.clear().draw();
            arr.forEach(element=>{
              t.row.add([
                      `${no++}`,
                      `${element.name}`,
                      `${element.price}`,
                      `${element.TotalQty}`,
                      `${element.TotalAmount}`,
                      `
                      <a href="{{url('product_detail/${element.id}')}}" target='_blank'><button type="" class="btn btn-sm btn-primary">Product Detail</button><a>
                        
                      `
                  ]).draw(false);
            });
        })
        .catch(err=>console.log(err));
      });


      document.getElementById('user_filter_form').addEventListener('submit',()=>{
        // alert('user');
        event.preventDefault();
        var form=new FormData(document.getElementById('user_filter_form'));
        axios.post(domain+'api/user_report',form,{
          headers: {
            Authorization: TokenData.get()
          }
        })
        .then(res=>{
            console.log(res);
            let arr=res.data.data;
            if(arr.length==0){
              Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'No Data',
                showConfirmButton: true,
                // timer: 1500
              })
            }
            else{
              show_user_data(arr);
            }
            
           
        })
        .catch(err=>console.log(err));
      });
      show_user_data=function(arr){
          var no = 1;
            ut.clear().draw();
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
              btn+=`<input type="button" class="btn btn-sm btn-danger" value="Cancel" onclick="delete_data(${element.id})">`
              ut.row.add([
                  `${no++}`,
                  `${element.name}`,
                  `${element.phone}`,
                  `${element.address}`,
                  `${element.township_name}`,
                  // {{--  `${element.receive_time}`,  --}}
                  `${element.order_id}`,
                  btn
              ]).draw(false);
            })
        }



    });
  </script>
  
@endsection