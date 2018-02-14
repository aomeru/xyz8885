@extends('layouts.admin')

@section('title', $item->batch_no.' Batch')

@section('page_title')
	<i class="fa fa-th mr10"></i>{{$item->batch_no}}
@endSection


@section('bc')
	<ol class="breadcrumb float-right nav_breadcrumb_top_align" style="margin-bottom: 0">
		<li class="breadcrumb-item h-padding-5">
			<a href="{{route('admin.dashboard')}}">
				Dashboard
			</a>
		</li>
		<li class="breadcrumb-item h-padding-5">
			<a href="{{route('admin.po')}}">Purchase Order</a>
        </li>
        <li class="breadcrumb-item h-padding-5">
			<a href="{{route('admin.po.show', Crypt::encrypt($item->purchase->id))}}">{{$item->purchase->title}}</a>
		</li>
		<li class="breadcrumb-item active h-padding-5 no-right-padding">{{$item->batch_no}}</li>
	</ol>
@endsection


@section('content')

	<div id="loadDiv">

		<div class="row">

			<div class="col-sm-3 xs-mb20">
				
				<div class="card">

					<div class="card-block">

						<dl class="row mb0">
							<dt class="col-4">Batch</dt>
							<dd class="col-8">{{$item->batch_no}}</dd>

							<dt class="col-4">Purchase Order</dt>
							<dd class="col-8">{{ $item->purchase->title }}</dd>

							<dt class="col-4">Added By</dt>
							<dd class="col-8">{{$item->user->firstname.' '.$item->user->lastname}}</dd>

							<dt class="col-4">Inventories</dt>
							<dd class="col-8"><span class="ml5 badge badge-primary font-no-bold">{{ $item->inventories->count() == 0 ? 0 : $item->inventories->count() }}</span></dd>

							<dt class="col-4">Created</dt>
                            <dd class="col-8">{{date('d-m-y, g:ia', strtotime($item->created_at))}}</dd>
                            
                            <dt class="col-4">Updated</dt>
							<dd class="col-8">{{date('d-m-y, g:ia', strtotime($item->created_at))}}</dd>
						</dl>

					</div>

				</div>

			</div>

			<div class="col-sm-9">

				<div class="card">

					<div class="card-header bgc-333">
						<h4 class="font-600 text-center no-padding no-margin text-uppercase c-fff">Inventories</h4>
					</div>


					<div class="card-block">

						@if ($item->inventories->count() == 0)

							<p class="alert alert-info">There is no inventory added to this batch record.</p>

						@else

							<div class="table-responsive">

								<table class="data-table table table-striped table-bordered table-hover nowrapp" width="100%" data-page-length="50">

									<thead>
										<tr class="active">
											<th>#</th>
											<th>Serial No</th>
											<th>Title</th>
											<th>Type</th>
											<th>Processor</th>
											<th class="text-center">Allocated</th>
										</tr>
									</thead>

									<tbody>

										@php $row_count = 1 @endphp

										@foreach($item->inventories()->orderBy('created_at','desc')->get() as $item)

											<tr id="row-{{$item->id}}" data-hrid="{{$item->id}}" data-id="{{Crypt::encrypt($item->id)}}" data-batch-no="{{$item->purchase == null ? '' : $item->purchase->title}}" data-item-type="{{$item->item->title}}" data-serial-no="{{$item->serial_no}}">

												<td>{{ $row_count }}</td>
												<td>
													<u><a href="{{route('admin.inv.show', Crypt::encrypt($item->id))}}" class="c-06f">{{ $item->serial_no }}</a></u>
												</td>
												<td>{{ $item->item->title }}</td>
												<td>{{ $item->item->type }}</td>
												<td>{!! $item->item->processor == null ? '<span class="c-999">N/A</span>' : $item->item->processor !!}</td>
												<td class="text-center">{!!$item->allocation == null ? '<span class="c-f00">No</span>' : '<span class="c-2c5">Yes</span>'!!}</td>

											</tr>

											@php $row_count++ @endphp

										@endforeach

									</tbody>

								</table>
							</div>

						@endif

					</div>

				</div>

			</div>

		</div>
	</div>

@endSection


@section('page_footer')


@endsection


@section('footer')
	<script>
		$(function () {
			'use strict';

			$('.data-table').DataTable({
				"dom": "<'row'<'col-md-6 col-12'l><'col-md-6 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
				"order": [
					//[0, "asc"]
				]
			});
			$(".dataTables_wrapper").removeClass("form-inline");

			function getErrorMessage(jqXHR, exception) {
				var msg = '';
				if (jqXHR.responseJSON) {
					var errors = (jqXHR.responseJSON.errors);
					$.each(errors, function (key, value) {
						msg = value[0];
					})
				} else if (jqXHR['errors']) {
					msg = jqXHR['errors'];
				} else if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network. <br>Please Contact Support Team.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]. <br>Please Contact Support Team.';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500]. <br>Please Contact Support Team.\n' + jqXHR.responseText;
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed. <br>Please Contact Support Team.';
				} else if (exception === 'timeout') {
					msg = 'Time out error';
				} else if (exception === 'abort') {
					msg = 'Request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				return msg;
			}

			function pnotify_alert(type, text) {
				var icon = 'fa-times';
				if (type == 'success') {
					icon = 'fa-check'
				}

				new PNotify({
					addclass: 'font-16x text-center',
					title: false,
					text: text,
					type: type,
					hide: true,
					icon: 'fa ' + icon + ' font-18x',
					delay: 5000,
					styling: 'bootstrap3',
					nonblock: {
						nonblock: true,
						nonblock_opacity: .5,
					}
				});
			}

		});
	</script>
@endSection