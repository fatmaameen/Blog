@extends('layouts.master')

@section('title')
  Admin/Categories
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Admin</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> Categories</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> New Category</a>
                                    </div>
                                        </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1"  >

                                            <thead>
                                                <h4>All Categories</h4>
                                                <tr>
                                                    <th class="border-bottom-0">#ID</th>
                                                    <th class="border-bottom-0">NAME</th>
                                                    {{-- <th class="border-bottom-0"> Active</th> --}}
                                                    <th class="border-bottom-0">Created Date </th>
                                                    <th class="border-bottom-0">Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($categories as $category )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td> {{ $category->created_at }}</td>

                                                         <td>
                                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-id="{{$category->id }}" data-name="{{ $category->name }}" data-toggle="modal" href="#modaldemo9"> edit </a>
                                                               <a class="modal-effect btn btn-outline-danger btn-block" data-effect="effect-scale" data-id="{{ $category->id }}" data-toggle="modal" href="#modaldemo1"> delete </a>
                                                       </td>

                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
				</div>
				<!-- row closed -->
			</div>
            <div class="modal" id="modaldemo8">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add New Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('categories.store')}}" method="Post">
                            @csrf

                            <div class="form-group">
                            <label for="exampleInputEmail1" > Category Name</label>
                            <input type="text" class="form-control" id="name" name="name">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add</button>
                     </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="modaldemo9">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit Category </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('categories.update')}}" method="Post" id="editForm">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </form>

                    </div>

                </div>
            </div>
            </div>
            <div class="modal" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Are You Sure ??
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('categories.delete') }}" method="Post" id="deleteForm">
                            @csrf
                          @method('DELETE')
                            <div class="form-group">
                           <input type="hidden" name="id" id="id" value="{{$category->id}}">
                            <p>You won't be able to revert this! </p>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes</button>
                     </div>
                    </form>
                    </div>

                </div>
            </div>
            </div>
            </div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
    })
</script>
<!-----
<script>
    // Assuming you have the ID value available in a variable called 'categoryId'
    var categoryId = "your_category_id";
    document.getElementById('id').value = categoryId;
</script>
    --------->

@endsection
