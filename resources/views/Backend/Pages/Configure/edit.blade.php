@extends("Backend.Layouts.master")
@section('title', 'Congituration/Update')
@section('master-content')
  <div class="container">
    <div class="card">
      <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
              <h5 class="fw-bolder">Update Configuration</h5>
              <a href="{{ route('admin.configuration.index') }}" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-arrow-left mr-1"></i> Back</a>
          </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.configuration.update', $configuration->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="logo" class="form-label">Choose a Logo</label>
                <div class="custom-file">
                    <input type="file" name="logo" class="custom-file-input" id="image">
                    <label class="custom-file-label" for="image">Choose webiste logo</label>
                </div>
                @error('logo')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
                <img id="ImagePreview" style="border: 1px solid #ddd; padding:5px; width:100px; margin-top:10px" src="{{ $configuration->logo == NULL ? asset("img-preview.png") : asset($configuration->logo) }}" alt="">
              </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="number" name="phone" class="form-control" id="phone" value="{{ $configuration->phone }}">
              @error('phone')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="{{ $configuration->email }}">
              @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
              @enderror
            </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" rows="3">{!! $configuration->address !!}</textarea>
                @error('address')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="companydetail" class="form-label">Companydetail (Footer)</label>
                <textarea name="companydetail" class="form-control" id="companydetail" rows="3">{!! $configuration->companydetail !!}</textarea>
                @error('companydetail')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" name="facebook" class="form-control" id="facebook" value="{{ $configuration->facebook }}">
                @error('facebook')
                  <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="text" name="twitter" class="form-control" id="twitter" value="{{ $configuration->twitter }}">
                @error('twitter')
                  <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="youtube" class="form-label">YouTube</label>
                <input type="text" name="youtube" class="form-control" id="youtube" value="{{ $configuration->youtube }}">
                @error('youtube')
                  <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" id="instagram" value="{{ $configuration->instagram }}">
                @error('instagram')
                  <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="video" class="form-label">Video</label>
                <input type="text" name="video" class="form-control" id="video" value="{{ $configuration->video }}">
                @error('video')
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

</script>
@endpush
