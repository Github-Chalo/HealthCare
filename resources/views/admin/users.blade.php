@extends('admin.app')

@section('title','Users')

@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Users</div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Users List</h5>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Adreno No</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('admin.users.results', $user->id) }}">{{ $user->fullName() }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->adreno_no }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            {{-- Update Button --}}
                            <button class="btn btn-primary btn-sm edit-btn" 
                                    data-id="{{ $user->id }}" 
                                    data-adreno_no="{{ $user->adreno_no }}"
                                    data-action="{{ route('admin.users.update', $user->id) }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#updateModal">
                                Update
                            </button>

                            {{-- Delete Button --}}
                            <button class="btn btn-danger btn-sm delete-btn" 
                                    data-id="{{ $user->id }}" 
                                    data-action="{{ route('admin.users.delete', $user->id) }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" id="updateForm">
                @csrf
                <input type="hidden" name="user_id" id="update_user_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="update_adreno_no" class="form-label">Adreno No</label>
                            <input type="text" class="form-control" id="update_adreno_no" name="adreno_no" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="GET" id="deleteForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this user?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

{{-- JS to handle modal data injection --}}

<script>
    // Fill Update Modal
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {
            const adrenoNo = this.getAttribute('data-adreno_no');
            const actionUrl = this.getAttribute('data-action');

            document.getElementById('update_adreno_no').value = adrenoNo;
            document.getElementById('updateForm').setAttribute('action', actionUrl);
        });
    });

    // Set Delete Form Action
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const actionUrl = this.getAttribute('data-action');
            document.getElementById('deleteForm').setAttribute('action', actionUrl);
        });
    });
</script>


@endsection
