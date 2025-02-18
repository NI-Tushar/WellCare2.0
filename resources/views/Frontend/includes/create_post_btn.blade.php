@push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/create_post_btn.css') }}">
@endpush

<div class="create_post_button">
    <button onclick="showPostJob()">+ Post your job</button>
</div>

@push('script')
    <script>

        function show_logout_func(){
            let logout = document.querySelector(".logout_section");
            logout.style.display="flex";
        }
        function close_logout_func(){
            let logout = document.querySelector(".logout_section");
            logout.style.display="none";
        }
    </script>
