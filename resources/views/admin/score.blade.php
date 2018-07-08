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
<form action="{{url('score')}}" method="POST" id="demo1" class="demo" style="display:none;" autocomplete="off">
{{ csrf_field() }}
<div class="container">
	<div class="card" >
		<div class="card-header">
    	กรอกข้อมูลคะแนนเลือกตั้ง
  		</div>
  		<ul class="list-group list-group-flush">
  		<div class="container">
		<div class="row">
		    <div class="col-md-1"></div>
			<div class="col-md-5">
          <p>
            <label>ชื่อหัวหน้าพรรค</label>
            <input class="form-control"  type="text" value="{{$master[0]->master_name}}" disabled>
          </p>
          <p>
            <label>ตำบล</label>
            <input class="form-control" name="district" type="text" value="{{$header->district}}" disabled>
          </p>
          <p>
            <label>จังหวัด</label>
            <input class="form-control" name="province" type="text"  value="{{$header->province}}" disabled>
          </p>
			    <p>
            <label>คะแนนเสียง</label>
            <input class="form-control" type="number" value="" min="0" name="score" required>
          </p>
  			</div>
			<div class="col-md-5">
				  <p>
					  <label>ชื่อสมาชิก</label>
					  <input class="form-control"  type="text" value="{{$header->header_name}}" disabled>
				  </p>
          <p>
            <label>อำเภอ</label>
            <input class="form-control" name="amphoe" type="text" value="{{$header->amphoe}}" disabled>
          </p>
					<p>
            <label>เขตการเลือกตั้ง</label>
            <input class="form-control" name="{{$area->area_id}}" type="text" value="{{$area->area_name}}" disableก>
          </p>
			    <p>
            <label>วันเลือกตั้ง</label>
            <input class="form-control" type="date" name="date" required>
          </p>




			</div>
		    <div class="col-md-1"></div>
          </div>
          <div class="row">
            <div class="col-md-6"></div>
						<input type="hidden" class="form-control" name="master_id" value="{{$master[0]->master_id}}">
		        <input type="hidden" class="form-control" name="admin_id" value="{{$admin->admin_id}}">
						<input type="hidden" class="form-control" name="area_id" value="{{$area->area_id}}">
            <div class="col-md-5"><div align="right"><button type="submit" class="btn btn-info">บันทึกข้อมูล</button><br><br></div></div>
            <div class="col-md-1"></div>
          </div>
		</div>
		</ul>
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
