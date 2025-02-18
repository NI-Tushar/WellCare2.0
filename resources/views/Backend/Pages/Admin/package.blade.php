@extends("Backend.Layouts.master")
@push('css')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endpush
@section('title', 'Manage User')
@section('master-content')   
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bolder">All Packages</h5>
                    <a href="{{ route('admin.add.package') }}" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-plus mr-1"></i> Add Package</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">Sl</th>
                                <th>Name</th>
                                <th>Apply</th>
                                <th>Price</th>
                                <th>Features</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                            <tr>
                                <td>{{ $loop-> index + 1 }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->apply }}</td>
                                <td>{{ $package->price }}</td>
                                <td>
                                    <div class="d-flex flex-row bd-highlight" style="gap: .5em">    
                                        <!-- <a href="{{ route('admin.add-admin.edit', $package->id) }}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></a> -->
                                        <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

        // store
        $('body').on('change', '.status', function(e) {
        let isChecked = $(this).prop('checked');
        let slug = $(this).attr('data-status');
        let newStatus = isChecked ? 'Active' : 'Inactive'; // Determine the new status based on the checkbox state
        let base_url = window.location.origin;
        let url = `${base_url}/admin/post-status/${slug}`;

        axios.post(url, { status: newStatus })
            .then(response => {
            // Handle success
            // console.log("Response:", response);
            })
            .catch(error => {
            // Handle error
            // console.error("Error:", error);
            });
        });

  
</script>
@endpush