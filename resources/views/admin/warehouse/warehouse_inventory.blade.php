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
        <th>Product</th>
        <th>Employee</th>
        <th>Actual number</th>
        <th>Quantity checked</th>
        <th>Date</th>
        <th>Deviant</th>
        <th>State</th>
      </tr>
    </thead>
    <tbody>
    @foreach($wis as $row)
      <tr>
        <td><a href="/invoice/{{$row->id}}">{{ $row->pdname}}</a></td>
        <td>{{ $row->epname }}</td>
        <td>{{ $row->actual_number }}</td>
        <td>{{$row->quantity_checked }}</td>
        <td>{{ $row->date }}</td>
        <td>{{ $row->deviant }}</td>
        <td>{{ $row->state }}</td>
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
