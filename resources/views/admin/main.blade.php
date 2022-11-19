<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper mx-3">

@include('admin.nav')
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      		<form action="search" method="GET" class="container-fluid d-flex justify-content-center">
      			<div>
          			<input class="form-control" name="search" placeholder="{{__('lang.placeholder')}}">
      			</div>
      			<div>
          			<button type="submit" class="btn btn-success ml-2">{{__('lang.search')}}</button>
      			</div>
      		</form>
      	</div>