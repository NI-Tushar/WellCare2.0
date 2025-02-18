@extends("Backend.Layouts.master")
@section('title', 'User/Update')
@section('master-content')
  <div class="container">
    <div class="card">
      @if(session('repassword'))
          <div class="alert alert-danger">
              {{ session('repassword') }}
          </div>
      @endif
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <h5 class="fw-bolder">Update User</h5>
              <a href="{{ route('admin.add-admin.index') }}" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-arrow-left mr-1"></i> Back</a>
          </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.add-admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ $admin->name }}">
              @error('name')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" class="form-control" id="email" disabled value="{{ $admin->email }}">
              @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="text" name="password" class="form-control" id="password" placeholder="Enter New Password">
              @error('password')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="repassword" class="form-label">Re-new Password</label>
              <input type="text" name="repassword" class="form-control" id="repassword" placeholder="Enter Re-New Password">
              @error('repassword')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="repassword class="form-label">User Role</label>
                <select name="role" id="" class="form-control" {{ $admin->role === 'Admin' && $admin->id === 1 ? 'disabled' : '' }}>
                  <option value="">Select a role</option>
                  <option value="Admin" {{ $admin->role == 'Admin' ? 'selected': '' }}>Admin</option>
                  <option value="Editor" {{ $admin->role == 'Editor' ? 'selected': '' }}>Editor</option>
                  <option value="Moderator" {{ $admin->role == 'Moderator' ? 'selected': '' }}>Moderator</option>
                  @if($admin->role === 'Admin' && $admin->id === 1)
                  <input type="hidden" name="role" value="Admin">
                  @endif
                </select>
                @error('role')
                  <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
              </div>
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </form>
    </div>
  </div>
  </div>
@endsection

@push('script')
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
            
        reader.onload = function (e) {
        $('#ImagePreview').attr('src', e.target.result);
        }
            
          reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readURL(this);
    });


    $('#description').summernote({
    placeholder: 'Enter a descripton for your new about section',
    tabsize: 2,
    height: 400
  });
</script> 
@endpush