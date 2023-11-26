@extends('layouts.master')

@section('title')
  Admin/Posts
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
							<h4 class="content-title mb-0 my-auto">Admin</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> Posts</span>
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
                                    <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">New Post</a>
                                        </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1"  >

                                            <thead>
                                                <h4>All Posts</h4>
                                                <tr>
                                                    <th class="border-bottom-0">#ID</th>
                                                    <th class="border-bottom-0">TITLE</th>
                                                    <th class="border-bottom-0">AUTHOR </th>
                                                    <th class="border-bottom-0">CATEGORY</th>
                                                  {{-- <th class="border-bottom-0"> Active</th> --}}
                                                   <th class="border-bottom-0">COMMENTS</th>
                                                   {{-- <th class="border-bottom-0">VIEWS</th> --}}
                                                   <th class="border-bottom-0">CREATED_DATE</th>
                                                    <th class="border-bottom-0">Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($posts as $post )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><a href="{{ route('post.link' , $post->id) }}" class="link-success">{{ $post->title}}</a></td>
                                                    <td> {{ Auth::user()->name }}</td>
                                                    <td> {{ $post->category->name }}</td>
                                                   <td> {{ 0 }}</td>
                                                    <td> {{ $post->created_at }}</td>
                                                         <td>
                                                            <a class="btn btn-primary" role="button" href="{{route('posts.edit' ,$post->id)  }}"> edit </a>
                                                            <a class="btn btn-danger" role="button" href="{{route('posts.delete' ,$post->id)  }}"> delete </a>
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
@endsection
