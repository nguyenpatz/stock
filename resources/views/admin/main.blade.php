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
            <h1 class="m-0">{{$header}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$breadcrumb_item}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      		<form class="container-fluid d-flex justify-content-center">
      			<div>
          			<input class="form-control" placeholder="Input data ...">
      			</div>
      			<div>
          			<button class="btn btn-success ml-2">Search</button>
      			</div>
      		</form>
      	</div>
      	
      	<div class="container-fluid row my-2 d-flex justify-content-between pl-0">
      		<a href="/order/create">
      			<button class="btn btn-success">Create</button>
      		</a>
      		<div class="row">
				<button class="btn btn-primary mx-1 btn-sm rounded-pill">Prev</button>
      			<div class="row mx-1">
					<input style="width: 50px; outline: none;" class="mr-1 rounded" type="number"/>
					<input style="width: 50px; outline: none;" class="rounded" type="number"/>
				</div>
				<button class="btn btn-primary mr-1 btn-sm rounded-pill">Next</button>
      		</div>
      		</div>
      	</div>