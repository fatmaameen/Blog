@extends('layouts.master')

@section('title')
<h3>Pending Comments</h3>
  Admin/Comments
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
							<h4 class="content-title mb-0 my-auto">Admin</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> Comments</span>
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

                                        </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1"  >

                                            <thead>
                                                <h4>All Comments</h4>
                                                <tr>
                                                    <th class="border-bottom-0">#ID</th>
                                                    <th class="border-bottom-0">COMMENT</th>
                                                    <th class="border-bottom-0">NAME </th>
                                                    <th class="border-bottom-0">EMAIL</th>
                                                   <th class="border-bottom-0">CREATED_DATE</th>
                                                    <th class="border-bottom-0">Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($comments as $comment )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $comment->name }}</td>
                                                    <td> {{ Auth::user()->name }}</td>
                                                    <td> {{ Auth::user()->email }}</td>
                                                    <td> {{ $comment->created_at }}</td>
                                                         <td>
                                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-id="{{ $comment->id }}" data-name="{{ $comment->name }}" data-toggle="modal" href="#modaldemo9"> edit </a>
                                                               <a class="modal-effect btn btn-outline-danger btn-block" data-effect="effect-scale" data-id="{{ $comment->id }}" data-toggle="modal" href="#modaldemo1"> delete </a>
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
                        <form action="{{ route('categories.store') }}" method="Post">
                            @csrf

                            <div class="form-group">
                            <label for="exampleInputEmail1" > Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="name">

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
                            <h6 class="modal-title">Edit Comment </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('comments.update') }}" method="Post">
                            @csrf
                           @method('PUT')
                            <div class="form-group">
                            <label for="exampleInputEmail1" > Comment Name</label>
                            <input type="hidden" name="id" id="id" value="{{$comment->id }}">
                            <input type="text" class="form-control" id="name" name="name">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">edit</button>
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
                            <h6 class="modal-title">Are You Sure ?? </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('comments.delete') }}" method="Post">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="{{$comment->id}}">
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
@endsection
