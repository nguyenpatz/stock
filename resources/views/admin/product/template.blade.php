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
        <th>Category</th>
        <th>Date Manufacture</th>
        <th>Expiry Date</th>
      </tr>
    </thead>
    <tbody>
    @foreach($invoices as $row)
      <tr>
        <td><a href="/template/{{$row->id}}">{{ $row->ptname}}</a></td>
        <td>{{ $row->ctname }}</td>
        <td>{{ $row->date_manufacture}}</td>
        <td>{{$row->expery_date }}</td>
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
