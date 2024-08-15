<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Leave Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Leave Request</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('leave-requests.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="employee_name" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ old('employee_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="leave_type" class="form-label">Leave Type</label>
                <input type="text" class="form-control" id="leave_type" name="leave_type" value="{{ old('leave_type') }}" required>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
            </div>
            <div class="mb-3">
                <label for="reason" class="form-label">Reason</label>
                <textarea class="form-control" id="reason" name="reason" rows="3" required>{{ old('reason') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Leave Request</button>
            <a href="{{ route('leave-requests.index') }}" class="btn btn-secondary">Back to Index</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
