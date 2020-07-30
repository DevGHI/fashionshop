@extends('layouts.master')
@section('title')
@endsection

@section('content')
<div class="main-content" id="panel">
  <div class="container"><br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-transparent border-0">
            <div class="row">
              <div class="col-md-4">
                <h3 class="text mb-0">
                  Order
                </h3>
              </div>
          </div>
          <div class="card-body">
            <input type="hidden" id="order_id" value="{{$id}}">
            <div class="row" id="detail_photo"></div>
            <br>
            <h4><b>Order Detail</b></h4><br>
            <span><strong> Name : &nbsp;</strong></span>
            <span class="pull-right" id="name"></span>
            <br><br>
            <span><strong> Phone : &nbsp;</strong></span>
            <span class="pull-right" id="phone"></span>
            <br><br>
            <span><strong> Address : &nbsp;</strong></span>
            <span class="pull-right" id="address"></span>
            <br><br>
{{--             <span><strong> Township &nbsp;</strong></span>
            <span class="pull-right" id="township"></span>
            <br><br>
            <span><strong> Receice Date &nbsp;</strong></span>
            <span class="pull-right" id="receive_date"></span>
            <br><br> --}}
            {{--  <span><strong> Receice Date &nbsp;</strong></span>
            <span class="pull-right" id="receive_date"></span>
            <br><br>  --}}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')

  <script>


      let id = document.querySelector('#order_id').value;
      // console.log(id);
      axios.get(domain+'api/orders/'+id,{
        headers: {
          Authorization:TokenData.get()
        }
      })
      .then(response=>{
        // console.log(response);
        console.log(response['data'][1]);
        var arr = response['data'][1];
        // console.log(arr.id);
        // console.log(arr.photo[0].photo_url);
        document.querySelector('#name').innerHTML = arr.customer_data.name;
        document.querySelector('#phone').innerHTML = arr.customer_data.phone;
        document.querySelector('#address').innerHTML = arr.customer_data.address;
        // document.querySelector('#township').innerHTML = arr.township;
        // document.querySelector('#receive_date').innerHTML = arr.receive_date;

        // let detail_photo = document.querySelector('#detail_photo');
        // detail_photo.innerHTML="";
        // if (arr.photo[0].photo_url.length > 0 ){
        //   for(let i = 0;i<arr.photo[0].photo_url.length;i++){
        //     detail_photo.innerHTML+=`
        //         <div class="col-md-4" style="padding: 10px;">
        //           <div class="img-thumbnail" style="width:100%;height:250px;">
        //             <img  style="max-width: 100%;max-height: 100%;display: block;margin: 0 auto;text-align: center;" src="${arr.photo[i].photo_url}">
        //           </div>
        //         </div>
        //     `;
        //   }
        // }
      })
      .catch(err=>console.log(err));
  </script>  
@endsection