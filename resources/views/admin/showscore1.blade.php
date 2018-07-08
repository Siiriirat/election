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
  <style >
  @media screen and (max-width: 992px) {
  input[type=number]{
   width: 100px;
   }
 }
  </style>
</head>
<body>
<br>
<br>

<div class="container">

  @if(isset($scores))
  <br>
  <form action="{{url('/action')}}" method="POST" role="form">
        <div class="col-md-12 ">
          <div align="right">
            <!-- admin -->
            <?php $index = 1 ;?>
            <button type="submit" name="update" value="update" id="update{{$scores[0]->score_id}}" class="btn btn-info btn-md" disabled="disabled"><span class="glyphicon glyphicon-edit"></span> อัพเดทคะแนน</button>
      			<button type="submit" name="delete" value="delete" id="delete{{$scores[0]->score_id}}" class="btn btn-danger btn-md" disabled="disabled" onclick="return confirm('ท่านต้องการลบคะแนนเขตนี้ใช่หรือไม่')">
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
                            <th width="20%">คะแนนเสียง</th>
                            <th>วันเลือกตั้ง</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($scores as $index => $score)
                          <tr>
                            <td>
                              <input type="hidden" name="{{$score->score_id}}">
                              <input type="checkbox" class="group" id="{{$score->score_id}}" name="checkbox[]" value="{{$score->score_id}}">
                            </td>
                            <td class="hidden-xs">{{$NUM_PAGE*($page-1) + $index+1}}</td>
                            <td>{{$score->area_name}}</td>
                            <td>{{$score->district}}</td>
                            <td>{{$score->amphoe}}</td>
                            <td>{{$score->province}}</td>
                            <td><input class="form-control" name="score[]" id="score{{$score->score_id}}" type="number" value="{{$score->score}}" disabled="disabled"></td>

                            <td>{{$score->date}}</td>

                          </tr>
                          @endforeach
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
    {{ $scores->links() }}
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
