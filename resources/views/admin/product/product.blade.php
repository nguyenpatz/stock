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
        <th>Template</th>
        <th>Price</th>
        <th>Price Cost</th>
        <th>Date Manufacture</th>
        <th>Expery</th>
        <th>State</th>
        <th>Heigth</th>
        <th>Width</th>
        <th>Length</th>
        <th>Weight</th>
        <th>Color</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	@foreach($news as $row)
      <tr>
        <td><a href="/admin/product/{{$row->id}}">{{$row->name}}</a></td>
        <td>{{$row->template_id}}</td>
        <td>{{$row->price}}</td>
        <td>{{$row->price_cost}}</td>
        <td>{{$row->data_manufacture}}</td>
        <td>{{$row->expery}}</td>
        <td>{{$row->state}}</td>
        <td>{{$row->height}}</td>
        <td>{{$row->width}}</td>
        <td>{{$row->length}}</td>
        <td>{{$row->weight}}</td>
        <td>{{$row->color}}</td>
        <td>
	        <button class="btn btn-success btn-sm">View</button>
	        <button class="btn btn-success btn-sm">Edit</button>
        </td>
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
