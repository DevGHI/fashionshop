<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" id="job_post_id" value="{{$job_post_id}}">

                            <div class="row" id="job_post_photo_inner">

                            </div>
                            <br>
                            <h4><b>Main Conditions</b></h4>
                            
                            <span> Position</span>
                            <span class="pull-right" id="position"></span>
                            <br>
                            <span>Vancant</span>
                            <span class="pull-right" id="vancant"></span>
                            <br>
                            <span>Salary</span>
                            <span class="pull-right" id="salary"></span>
                            <br>
                            <span>Join Date</span>
                            <span class="pull-right" id="join_date"></span>
                            <br>
                            <span>Duration of contract</span>
                            <span class="pull-right" id="duration"></span>
                            <br>
                            <span>Level of English</span>
                            <span class="pull-right" id="eng_level"></span>
                            <br>
                            <span>Requirements</span>
                            <span class="pull-right" id="requirement"></span>
                            <br>

                            <br>
                            <h4><b>Vessel Details</b></h4>
                            
                            <span>Vessel Name</span>
                            <span class="pull-right" id="vessel_name"></span>
                            <br>

                            <span>Vessel Type</span>
                            <span class="pull-right" id="vessel_type"></span>
                            <br>

                            <span>Build Year</span>
                            <span class="pull-right" id="build_year"></span>
                            <br>

                            <span>D.W.T</span>
                            <span class="pull-right" id="dwt"></span>
                            <br>

                            <span>Flag</span>
                            <span class="pull-right" id="flag"></span>
                            <br>

                            <span>Main Engine</span>
                            <span class="pull-right" id="main_engine"></span>
                            <br>


                            <span>Crew onboard</span>
                            <span class="pull-right" id="crew_onboad"></span>
                            <br>


                            <span>Sailing Area</span>
                            <span class="pull-right" id="sailing_area"></span>
                            <br>

                            <br>
                            <h4><b>Additional Info</b></h4>
                            <p id="additional"></p>
                            <br>
                            <h4><b>Post Owner</b></h4>
                            <p id="post_owner"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>






@endsection

@section('js')

    <script>
        load();
        function load() {
            let token=CookieUtil.get('token');
            console.log(token);
            let id = document.querySelector('#job_post_id').value;
            fetch(service_url+'api/jobposts/'+id, {
                method: 'get',
                headers: {
                    'Authorization':token,
                    // 'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(res => res.json())
            .then(res => {
                console.log(res);
                document.querySelector('#position').innerHTML = res[1].rank.name;
                document.querySelector('#vancant').innerHTML = res[1].vancant;
                document.querySelector('#salary').innerHTML = res[1].salary;
                document.querySelector('#join_date').innerHTML = res[1].join_date;
                document.querySelector('#duration').innerHTML = res[1].contract_duration;
                document.querySelector('#eng_level').innerHTML = res[1].english_level;
                document.querySelector('#requirement').innerHTML = res[1].requirement;
                document.querySelector('#salary').innerHTML = res[1].salary;

                document.querySelector('#vessel_name').innerHTML = res[1].vessel_name;
                document.querySelector('#vessel_type').innerHTML = res[1].vessel_type.name;
                document.querySelector('#build_year').innerHTML = res[1].build_year;
                document.querySelector('#dwt').innerHTML = res[1].dwt;
                document.querySelector('#flag').innerHTML = res[1].flag.country_name;
                document.querySelector('#main_engine').innerHTML = res[1].main_engine;
                document.querySelector('#crew_onboad').innerHTML = res[1].crew_onboard;
                document.querySelector('#sailing_area').innerHTML = res[1].sailing_area;

                document.querySelector('#additional').innerHTML = res[1].description;
                document.querySelector('#post_owner').innerHTML = res[1].post_owner.name;

                let job_post_photo_inner = document.querySelector('#job_post_photo_inner');
                job_post_photo_inner.innerHTML="";
                if (res[1].photos.length > 0 ){
                    for(let i = 0;i<res[1].photos.length;i++){
                        job_post_photo_inner.innerHTML+=`
                            <div class="col-md-4" style="padding: 10px;">
                                <div class="img-thumbnail" style="width:100%;height:250px;">
                                    <img  style="max-width: 100%;max-height: 100%;display: block;margin: 0 auto;text-align: center;" src="${res[1].photos[i]}">
                                </div>
                            </div>
                        `;
                    }
                }
                

            });
        }
    </script>
@endsection