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
        <th>{{__('lang.name')}}</th>
        <th>{{__('lang.type')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach($warehouses as $row)
      <tr>
        <td><a href="/invoice/{{$row->id}}">{{ $row->name}}</a></td>
        <td>{{ $row->type }}</td>
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
