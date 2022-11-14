<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container">
	<div class="container row rounded border p-4">
		<div class="col-2">
			<button class="btn btn-info" style="width: 70px">Edit</button>
			<button class="btn btn-danger">Unlink</button>
			<button class="btn btn-success mt-1" style="width: 70px">Done</button>
			<button class="btn btn-success mt-1" style="width: 70px">Sent</button>
		</div>
		<div class="col-6">
			<ul>
                <li>Name: {{ $pt->name }}</li>
                <li>Bank Account: {{ $pt->bank_name }}</li>
                <li>Bank Number: {{ $pt->bank_number }}</li>
                <li>Address: {{ $pt->address }}</li>
                <li>Phone: {{ $pt->phone }}</li>
			</ul>
		</div>
		<div class="col-6">
			<ul>
                <li>Email: {{ $pt->email }}</li>
                <li>Note: {{ $ipeps->note }}</li>
                <li>Old: {{ $ipeps->old }}</li>
			</ul>
		</div>
	</div>
</div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
@include('admin.footer')
</body>
</html>
