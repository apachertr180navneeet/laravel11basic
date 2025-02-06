@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Sub Company</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sub Company</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">List</h4>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated by DataTables -->
                            </tbody>
                        </table>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>

    </div> <!-- container -->
</div> <!-- content -->

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#basic-datatable').DataTable({
            alert('hello there');
            processing: true,
            serverSide: true,
            ajax: '{{ url("admin/sub-companies/getall") }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'status', name: 'status', render: function(data, type, row) {
                    return data === 'active' ? 
                        '<span class="badge bg-success">Active</span>' : 
                        '<span class="badge bg-danger">Inactive</span>';
                }},
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
