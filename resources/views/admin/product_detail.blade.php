@extends('layouts.master')
@section('title')
@endsection

@section('content')
<div class="main-content" id="panel">
  <!-- Topnav -->
  <!-- Header -->
  <div class="container"><br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-transparent border-0">
            <div class="row">
              <div class="col-md-4">
                <h3 class="text mb-0">
                  Category
                </h3>
              </div>
          </div>
          <div class="card-body">
            <input type="hidden" id="product_id" value="{{$id}}">
            <div class="row" id="detail_photo"></div>
            <br>
            <h4><b>Product Detail</b></h4><br>
            <span><strong> Name : &nbsp;</strong></span>
            <span class="pull-right" id="name"></span>
            <br><br>
            <span><strong> Price : &nbsp;</strong></span>
            <span class="pull-right" id="price"></span>
            <br><br>
            <span><strong> Category : &nbsp;</strong></span>
            <span class="pull-right" id="category"></span>
            <br><br>
            <span><strong> Color : &nbsp;</strong></span>
            <span class="pull-right" id="color"></span>
            <br><br>
            <span><strong> Size : &nbsp;</strong></span>
            <span class="pull-right" id="size"></span>
            <br><br>
            <span><strong> Detail : &nbsp;</strong></span>
            <span class="pull-right" id="detail"></span>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')

  <script>


      let id = document.querySelector('#product_id').value;
      console.log(id);
      axios.get(domain+'api/products/'+id,{
        headers: {
          Authorization:TokenData.get()
        }
      })
      .then(response=>{
        console.log(response['data']['data']);
        var arr = response['data']['data'];
        console.log(arr.photo[0].photo_url);
        document.querySelector('#name').innerHTML = arr.name;
        document.querySelector('#price').innerHTML = arr.price;
        document.querySelector('#category').innerHTML = arr.subcategory.name;
        document.querySelector('#detail').innerHTML = arr.detail;
        document.querySelector('#color').innerHTML = JSON.parse(arr.color_name).toString();
        document.querySelector('#size').innerHTML = JSON.parse(arr.size_name).toString();
        let detail_photo = document.querySelector('#detail_photo');
        detail_photo.innerHTML="";
        if (arr.photo[0].photo_url.length > 0 ){
          for(let i = 0;i<arr.photo[0].photo_url.length;i++){
            detail_photo.innerHTML+=`
                <div class="col-md-4" style="padding: 10px;">
                  <div class="img-thumbnail" style="width:100%;height:250px;">
                    <img  style="max-width: 100%;max-height: 100%;display: block;margin: 0 auto;text-align: center;" src="${arr.photo[i].photo_url}">
                  </div>
                </div>
            `;
          }
        }
      })
      .catch(err=>console.log(err));




  </script>  
@endsection