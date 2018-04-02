@extends('admin.layouts.master')

@section('admin.content')

<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Trashed Accounts
		</div>
		<div class="panel-body">
			@if($trashedAccounts->count())
				<table class="table table-hover">
					<thead class="text-center">
						<th>
							Avatar
						</th>
						<th>
							Name
						</th>
						<th>
							Email
						</th>
						<th>
							Deleted At
						</th>
						<th>
							Action
						</th>
					</thead>

					<tbody>
						@foreach($trashedAccounts as $account)

						<tr>
							<td>
								<img src="{{ Storage::url($account->avatar)}}" width="80px" height="80px" style="border-radius: 80px">
							</td>
							<td>
								{{ $account->full_name }}
							</td>
							<td>
								{{ $account->email }}
							</td>
							<td>
								{{ $account->deleted_at }}
							</td>
							<td>
								<a href="{{ route('admin.recover.account', ['slug' => $account->slug]) }}" class="btn btn-xs btn-success">
									Restore
								</a>
								<a href="{{ route('admin.delete.account', ['slug' => $account->slug]) }}" class="btn btn-xs btn-danger">
									Delete
								</a>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
				@else
					<h5>There are no deactivated accounts.</h5>
				@endif
		</div>
	</div>
</div>
@endsection