
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User|Login</title>
        <link href="{{ url('user/css/style.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-warning">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form id="login_form">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email"/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password"/></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html">Forgot Password?</a><input type="submit" class="btn btn-primary" value="Login"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{ url('user/register') }}">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; E-Commerce 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    <!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>

 
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/customjs/CookieUtil.js') }}"></script>
<script src="{{ asset('js/customjs/helper.js') }}"></script>
<script>
   let login_form=document.getElementById('login_form');
   login_form.addEventListener('submit',()=>{
     event.preventDefault();
     let form=new FormData(login_form);
     axios.post(domain+"api/win",form)
          .then(res=>{
            console.log(res.data);
            if(res.data.status=='fail'){
              Swal.fire({
                icon: 'error',
                title: 'Login Fail! Try Again',
                text: res.data.message,
                // footer: '<a href>Why do I have this issue?</a>'
              })
            }
            else if(res.data.status=='success' && res.data.user.user_type=='customer'){
              
              var api_token=res.data.token;
              // console.log(api_token);
              var expiryDate = new Date();
               		 expiryDate.setMonth(expiryDate.getMonth() + 1);
              CookieUtil.set('user_token',api_token,expiryDate,'/');

              CookieUtil.set('user_info',JSON.stringify(res.data.user),expiryDate,'/');
              // console.log(tokenobj.token);
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Successfuly Login!.',
                showConfirmButton: false,
                timer: 1500
              })
             window.location.href='../checkout';
            }
            else{
              Swal.fire({
                icon: 'error',
                title: 'Try again! Fail Login',
                text: res.data.message,
                // footer: '<a href>Why do I have this issue?</a>'
              }) 
            }
          })
          .catch(err=>console.log(err));
   });
</script>


</body>
</html>
