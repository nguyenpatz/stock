<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')
        <!-- Small boxes (Stat box) -->
<table class="table table-bordered">
    <thead>
     <tr class="bg-success">
        <th>Name</th>
        <th>Bank</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Old</th>
      </tr>
    </thead>
    <tbody>
    @foreach($partners as $row)
      <tr>
        <td><a href="/invoice/{{$row->id}}">{{ $row->name}}</a></td>
        <td>{{ $row->bank_id }}</td>
        <td>{{ $row->address }}</td>
        <td>{{$row->phone }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->old }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
@include('admin.footer')
</body>
</html>
