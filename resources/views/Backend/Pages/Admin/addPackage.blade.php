@extends("Backend.Layouts.master")
@section('title', 'User/Create')
@section('master-content')
  <div class="container">
    <div class="card">
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <h5 class="fw-bolder">Add New Package</h5>
              <a href="" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-arrow-left mr-1"></i> Back</a>
          </div>
      </div>
      <div class="card-body">
        @if(session('repassword'))
            <div class="alert alert-danger">
                {{ session('repassword') }}
            </div>
        @endif

        <form action="{{ route('admin.store.package') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label for="name" class="form-label">Package Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Entr Package Name" value="{{ old('name') }}">
              @error('name')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email class="form-label">Apply Quantity</label>
              <input type="text" name="apply" class="form-control" id="apply" placeholder="Entr the Quantity of Package" value="{{ old('apply') }}">
              @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password class="form-label">Package Price</label>
              <input type="text" name="price" class="form-control" id="password" placeholder="Entr Package Price" value="{{ old('price') }}">
              @error('password')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-outline-primary">Save</button>
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