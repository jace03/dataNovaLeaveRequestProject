<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-striped.table-bordered th, .table-striped.table-bordered td {
            text-align: left;
        }
        .btn {
            min-width: 100px;
        }
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header-buttons {
            display: flex;
            gap: 10px;
        }
        .add-btn {
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header-row">
            <h1 class="text-center mb-4">Leave Requests</h1>
            <div class="header-buttons">
                <a href="{{ route('leave-requests.create') }}" class="btn btn-primary add-btn width:24;">Add Leave Request</a>
                <a href="{{ route('welcome') }}" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th class="d-none d-sm-table-cell">Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th class="d-none d-sm-table-cell">Reason</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $request)
                    <tr>
                        <td style="width: 150px !important;">{{ $request->employee_name }}</td>
                        <td class="d-none d-sm-table-cell">{{ $request->leave_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($request->start_date)->format('Y-m-d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($request->end_date)->format('Y-m-d') }}</td>
                        <td class="d-none d-sm-table-cell">{{ $request->reason }}</td>
                        <td >
                            <a href="{{ route('leave-requests.edit', $request->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $request->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $leaveRequests->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this leave request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var confirmDeleteModal = document.getElementById('confirmDeleteModal');
            confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var requestId = button.getAttribute('data-id');
                var form = document.getElementById('delete-form');
                form.action = `/leave-requests/${requestId}`;
            });
        });
    </script>
</body>

</html>
