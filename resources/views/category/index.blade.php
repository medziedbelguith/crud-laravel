@extends('layouts.master')

@section('content')
<div class="">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">All Categories</h3>
			</div>

			<div class="box-body">
				<table class="table table-responsive-xxl">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Modify</th>
						</tr>
						
					</thead>

					<tbody>

						@foreach($categories as $cat)
							<tr>
								<td>{{$cat->title}}</td>
								<td>{{$cat->description}}</td>
								<td>
									<button class="btn btn-info" style="color:white;" data-mytitle="{{$cat->title}}" data-mydescription="{{$cat->description}}" data-catid="{{$cat->id}}" data-toggle="modal" data-target="#edit">Edit</button>
									/
									<button class="btn btn-danger" data-catid="{{$cat->id}}" data-toggle="modal" data-target="#delete">Delete</button>
								</td>
							</tr>

						@endforeach
					</tbody>


				</table>				
			</div>
		</div>
	</div>

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	Add New
</button>

<!-- Modal -->
<div class="modal fade"  id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.store')}}" method="post">
        {{csrf_field()}}
      <div class="modal-body">
      @include('category.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>  
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.update','test')}}" method="post">
      {{method_field('patch')}}
        {{csrf_field()}}
      <div class="modal-body">
        <input type="hidden" name="category_id" id="cat_id" value="">
                @include('category.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
     </form>  
    </div>
  </div>
</div>

<!-- Delete Modal -->
 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.destroy','test')}}" method="post">
      {{method_field('delete')}}
        {{csrf_field()}}
      <div class="modal-body">
        <p class="text-center">
            Are you sure you want to delete  this?
        </p>
        <input type="hidden" name="category_id" id="cat_id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes ,Delete</button>
      </div>
      </form>  
    </div>
  </div>
</div>
 




@endsection