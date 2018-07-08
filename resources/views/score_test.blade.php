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

<div class="container">
  @if(isset($allareas))
  <form action="{{url('score_add')}}" method="POST" autocomplete="off">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
       <select name="area_id" id="area_id" class="form-control" required>
              <option disabled selected value="">เลือกเขตที่ต้องการจะกรอกคะแนน</option>
                @foreach($allareas as $area)
                  <option value="{{$area->area_id}}" required>{{ $area->area_name }}</option>
                @endforeach
       </select>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <input class="form-control" name="date" type="date" required>
      </div>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-success">ค้นหา</button>
    </div>
  </div>

  </form>
  @endif
  @if(isset($admin))
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
              <input class="form-control" name="master_name" type="text" value="{{$master[0]->master_name}}" disabled>
            </p>
            <p>
              <label>ตำบล</label>
              <input class="form-control" name="district" type="text" value="{{$header->district}}" disabled>
            </p>
            <p>
              <label>จังหวัด</label>
              <input class="form-control" name="province" value="{{$header->province}}" type="text" disabled>
            </p>
  			    <p>
              <label>คะแนนเสียง</label>
              <input class="form-control" type="number" value="" min="0" name="score" required>
            </p>
    			</div>
  			<div class="col-md-5">
  				  <p>
              <label>ชื่อสมาชิก</label>
              <input class="form-control" name="header_name" type="text" value="Header1" disabled>
            </p>
            <p>
              <label>อำเภอ</label>
              <input class="form-control" name="amphoe" value="{{$header->amphoe}}" type="text" disabled>
            </p>
            <div class="form-group">
              <p>
                <label>เขตการเลือกตั้ง</label>
                <input class="form-control" value="{{$area1->area_name}}" type="text" disabled>
              </p>
            </div>
  					<p>
             <label>วันเลือกตั้ง</label>
              <input class="form-control" name="date" type="date" value="{{$date}}" required>
            </p>

  			</div>
  		    <div class="col-md-1"></div>
            </div>
            <div class="row">
              <div class="col-md-6"></div>
  						<input type="hidden" class="form-control" name="master_id" value="1">
              <input type="hidden" class="form-control" name="area_id" value="{{$area1->area_id}}">
  		        <input type="hidden" class="form-control" name="admin_id" value="{{$admin->admin_id}}">
              <div class="col-md-5"><div align="right"><button type="submit" class="btn btn-info">บันทึกข้อมูล</button><br><br></div></div>
              <div class="col-md-1"></div>
            </div>
  		</div>
  		</ul>
  	</div>
  </div>
  </form>
  @elseif(isset($score))
  <br>
  <form action="{{url('/action')}}" method="POST" role="form">
        <div class="col-md-12 ">
          <div align="right">
            <!-- admin -->
            <button type="submit" name="update" value="update" id="update{{$score->score_id}}" class="btn btn-info btn-md" disabled="disabled"><span class="glyphicon glyphicon-edit"></span> อัพเดทคะแนน</button>
      			<button type="submit" name="delete" value="delete" id="delete{{$score->score_id}}" class="btn btn-danger btn-md" disabled="disabled" onclick="return confirm('ท่านต้องการลบคะแนนเขตนี้ใช่หรือไม่')">
            ลบคะแนน</button>
            {{csrf_field()}}
          </div>
          <br>
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-list">
                        <thead>
                          <tr>
                            <th><input type="checkbox" id="all" class="parent" data-group=".group"></th>
                            <th class="hidden-xs">#</th>
                            <th>ชื่อเขต</th>
                            <th>ตำบล</th>
                            <th>อำเภอ</th>
                            <th>จังหวัด</th>
                            <th width="15%">คะแนนเสียง</th>
                            <th>วันเลือกตั้ง</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <input type="hidden" name="{{$score->score_id}}">
                              <input type="checkbox" class="group" id="{{$score->score_id}}" name="checkbox[]" value="{{$score->score_id}}">
                            </td>
                            <td class="hidden-xs">1</td>
                            <td>{{$area->area_name }}</td>
                            <td>{{$header->district}}</td>
                            <td>{{$header->amphoe}}</td>
                            <td>{{$header->province}}</td>
                            <td><input class="form-control" name="score[]" id="score{{$score->score_id}}" type="number" value="{{$score->score}}" disabled="disabled"></td>

                            <td>{{$score->date}}</td>

                          </tr>
                        </tbody>

                      </table><!--/.table-->
                    </div><!--/.table-responsive-->
                </div><!--/.panel-body-->
                <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4"></div>
                  <div class="col col-xs-8">
                    <ul class="pull-right">
                    </ul>
                  </div>
                </div>
              </div>
            </div><!--/.panel-->
        </div>
      </form>
@endif
</div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
  <script type="text/javascript">
  	$(".parent").click(function(index){
  	var group = $(this).data("group");
  	var parent = $(this);
  	parent = parent.change();
  	parent.change(function(){  //"select all" change
  		 $(group).prop('checked', parent.prop("click"));
  	});
  });

  $('input').on("click", function(e){
  	var idcheck = e.target.id;
  		if(this.checked){
  			$('#score'+idcheck).removeAttr("disabled");
        $('#update'+idcheck).removeAttr("disabled");
        $('#delete'+idcheck).removeAttr("disabled");

  		}
  		else{
  			$('#score'+idcheck).attr("disabled", true);
      	$('#update'+idcheck).attr("disabled", true);
        $('#delete'+idcheck).attr("disabled", true);

  		}
  });

  </script>
</div>
</body>
</html>
