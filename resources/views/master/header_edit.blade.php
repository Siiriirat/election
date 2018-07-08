<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
  <link rel="stylesheet" href="{{asset('jquery.Thailand.js/dist/jquery.Thailand.min.css')}}">
</head>
<body>
<br>
<br>

<form action="update" method="POST" id="demo1" class="demo" style="display:none;" autocomplete="off" enctype="multipart/form-data">
<div class="container">
<div class="row">
<div class="col-md-3">
<div class="card">
    <div class="card-header">
      </div>
      <ul class="list-group list-group-flush">
      <div class="container"> 
    <div class="row">
        <div class="col-md-1"></div>
      <div class="col-md-5">
      </div>
      <div class="col-md-5">
      </div>
        <div class="col-md-1"></div>
          </div>
    </div>
    </ul>
</div>
</div>

<div class="col-md-9">
	<div class="card" >
		<div class="card-header">
    	กรอกข้อมูลสมาชิกในพรรค
  		</div>
  		<ul class="list-group list-group-flush">
  		<div class="container">	
		<div class="row">
		    <div class="col-md-1"></div>
			<div class="col-md-5">
			    <div class="form-group">
  					<label>ชื่อสมาชิก</label>
  					<input class="form-control" name="header_name" value="{{$header->header_name}}" type="text">
  				</div>
  				<p>
  					<label>ชื่อเข้าใช้งานระบบ</label>
  					<input class="form-control" name="username" value="{{$header->username}}" type="text">
  				</p>
  				
  				<p>
  					<label>เบอร์โทรศัพท์</label>
  					<input class="form-control" name="tel" value="{{$header->tel}}" type="text">
  				</p>  				
          <p>
            <label>อำเภอ</label>
            <input class="form-control" name="amphoe" value="{{$header->amphoe}}" type="text">
          </p>  
  			</div>
			<div class="col-md-5">
				<p>
  					<label>อีเมลเข้าใช้งานระบบ</label>
  					<input class="form-control" name="email" value="{{$header->email}}" type="text">
  				</p>
				<p>
  					<label>รหัสผ่าน</label>
  					<input class="form-control" name="password" value="{{$header->password}}" type="password">
  				</p>
            <p>
            <label>ตำบล</label>
            <input class="form-control" name="district" value="{{$header->district}}" type="text">
          </p>
          <p>
            <label>จังหวัด</label>
            <input class="form-control" name="province" value="{{$header->province}}" type="text">
          </p>
          			
				<input type="hidden" class="form-control" name="master_id" value="1">
        <input type="hidden" class="form-control" name="header_id" value="{{$header->header_id}}">
        {{ csrf_field() }}
			</div>
		    <div class="col-md-1"></div>
          </div>
          <div class="row">
			     <div class="col-md-6"></div>
			     <div class="col-md-5"><div align="right">
			     <button type="submit" class="btn btn-warning">อัพเดตข้อมูล</button><br><br></div></div>
			     <div class="col-md-1"></div>
          </div>
		</div>
		</ul>
	</div>
</div>
</div>
</form>
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/zip.js/zip.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/JQL.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/typeahead.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dist/jquery.Thailand.min.js')}}"></script>

<script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-33058582-1', 'auto', {
            'name': 'Main'
        });
        ga('Main.send', 'event', 'jquery.Thailand.js', 'GitHub', 'Visit');
</script>

<script type="text/javascript">
        $.Thailand({
            database: '{{asset('jquery.Thailand.js/database/db.json')}}', 
            $district: $('#demo1 [name="district"]'),
            $amphoe: $('#demo1 [name="amphoe"]'),
            $province: $('#demo1 [name="province"]'),
            $zipcode: $('#demo1 [name="zipcode"]'),
            onDataFill: function(data){
                console.info('Data Filled', data);
            },
            onLoad: function(){
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        $('#demo1 [name="district"]').change(function(){
            console.log('ตำบล', this.value);
        });
        $('#demo1 [name="amphoe"]').change(function(){
            console.log('อำเภอ', this.value);
        });
        $('#demo1 [name="province"]').change(function(){
            console.log('จังหวัด', this.value);
        });
        $('#demo1 [name="zipcode"]').change(function(){
            console.log('รหัสไปรษณีย์', this.value);
        });   
</script>
</body>
</html>


  

  
