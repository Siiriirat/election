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
  <link rel="stylesheet" href="./jquery.Thailand.js/dist/jquery.Thailand.min.css">
  <link href="css/show_member.css" rel="stylesheet">
</head>
<body>
<br>
<br>
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
        <div class="col-md-12 ">
            <div class="panel panel-info">
                <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">ตารางรายชื่อผู้ดูแลเขต</h3>
                  </div>
                  <!-- <div class="col col-xs-6 text-right">
                    <a href = "{{url('header_regis')}}" class="btn btn-sm btn-primary btn-create">เพิ่มสมาชิก</a>
                  </div> -->
                </div>
                </div><!--/.panel-heading-->
                <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-list">
                        <thead>
                          <tr>
                            <th></th>
                            <th class="hidden-xs">#</th>
                            <th>ชื่อผู้ดูแลเขต</th>
                            <th>ตำบล</th>
                            <th>อำเภอ</th>
                            <th>จังหวัด</th>
                            <th>คะแนนเสียง</th>
                            <th width="30%"><center><i class="fa fa-cog"></i></center></th>
                          </tr>
                        </thead>
                        @if(isset($admins))
                        @foreach($admins as $index => $admin)
                        <tbody>
                          <tr>
                            <td></td>
                            <td class="hidden-xs">{{$NUM_PAGE*($page-1) + $index+1}}</td>
                            <td><p>{{$admin->admin_name}}</p></td>
                            <td>{{$header->district}}</td>
                            <td>{{$header->amphoe}}</td>
                            <td>{{$header->province}}</td>
                            <td>10</td>
                            <td>
                            <center>
                              <a href="{{url('show')}}/{{$admin->admin_id}}/admin" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
                              <a href="{{url('edit')}}/{{$admin->admin_id}}/admin" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> แก้ไข</a>
                              <a href="" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการบล็อกผู้ดูแลเขตใช่หรือไม่ ?')"><i class="fa fa-ban"></i> บล็อก</a>
																		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm-{{$admin->admin_id}}">Small modal</button>

															{{csrf_field()}}
                            </center>
                            </td>
                          </tr>
                        </tbody>
                        @endforeach
                        @endif
                      </table><!--/.table-->
                    </div><!--/.table-responsive-->
                </div><!--/.panel-body-->
                <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4"></div>
                  <div class="col col-xs-8">
                    <ul class="pull-right">
                      {{ $admins->links() }}
                    </ul>
                  </div>
                </div>
              </div>
            </div><!--/.panel-->
        </div>
  </div>
  </div>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>




</body>
</html>
