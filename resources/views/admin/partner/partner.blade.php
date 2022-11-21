<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')
<a href="/partner_create">
  <button class="btn btn-success">{{__('lang.create')}}</button>
</a>
        <!-- Small boxes (Stat box) -->
<table class="table table-bordered">
    <thead>
     <tr class="bg-success">
        <th>{{__('lang.name')}}</th>
        <th>{{__('lang.bank')}}</th>
        <th>{{__('lang.address')}}</th>
        <th>{{__('lang.phone')}}</th>
        <th>Email</th>
        <th>{{__('lang.old')}}</th>
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
