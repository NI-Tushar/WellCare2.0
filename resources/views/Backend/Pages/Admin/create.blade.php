@extends("Backend.Layouts.master")
@section('title', 'User/Create')
@section('master-content')
  <div class="container">
    <div class="card">
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <h5 class="fw-bolder">Add New User</h5>
              <a href="{{ route('admin.add-admin.index') }}" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-arrow-left mr-1"></i> Back</a>
          </div>
      </div>
      <div class="card-body">
        @if(session('repassword'))
            <div class="alert alert-danger">
                {{ session('repassword') }}
            </div>
        @endif

        <form action="{{ route('admin.add-admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Entr a Name" value="{{ old('name') }}">
              @error('name')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email class="form-label">Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Entr a Email" value="{{ old('email') }}">
              @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password class="form-label">Password</label>
              <input type="text" name="password" class="form-control" id="password" placeholder="Entr a Password" value="{{ old('password') }}">
              @error('password')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="repassword class="form-label">Re-Password</label>
              <input type="text" name="repassword" class="form-control" id="repassword" placeholder="Entr a Re-Password">
              @error('repassword')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="repassword class="form-label">User Role</label>
              <select name="role" id="" class="form-control">
                <option value="">Select a role</option>
                <option value="Admin">Admin</option>
                <option value="Editor">Editor</option>
                <option value="Moderator">Moderator</option>
              </select>
              @error('role')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary">Create</button>
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