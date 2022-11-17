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
        <th>Partner</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
    @foreach($employees as $row)
      <tr>
        <td><a href="/invoice/{{$row->id}}">{{ $row->epname}}</a></td>
        <td>{{ $row->ptname }}</td>
        <td>{{ $row->address }}</td>
        <td>{{$row->email }}</td>
        <td>{{ $row->phone }}</td>
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
