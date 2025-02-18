<div>

    @push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/taker_posts.css') }}">
    @endpush


    <!-- ___________________________________ Post Job start -->
    <div id="post_job_div" class="service_offer_div">
        <div class="centered_service">
            <i onclick="hidePostJob()" class="fa-solid fa-circle-xmark"></i>
            <!-- _____________________ showPostJob form body start -->
            <div class="service_container">
                <h3>Post Your Job</h3>

                <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                     <div class="col-50">


                        <div class="row">
                            <div class="col-50">
                                <label for="title">Headline <span>*</span></label>
                                <input type="text" id="title" name="title" placeholder="Type here" value="{{ old('title') }}">
                                <p class="error_msg">@error('title'){{$message}}@enderror</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-50">
                                <label for="adr">Select Servivce <span>*</span></label>
                                <select name="service" id="catagory">
                                    <option value="" selected>Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <p class="error_msg">@error('service'){{$message}}@enderror</p>
                            </div>
                            <div class="col-50">
                                <label for="fname">Budget <span>*</span></label>
                                <input type="number" id="fname" name="budget" placeholder="Minimum 500 BDT" value="{{ old('budget') }}">
                                <p class="error_msg">@error('budget'){{$message}}@enderror</p>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-50">
                                <label for="state">Date <span>*</span></label>
                                <input type="date" id="state" name="date" placeholder="Pick a Date" value="{{ old('date') }}">
                                <p class="error_msg">@error('date'){{$message}}@enderror</p>
                            </div>
                            <div class="col-50">
                                <label for="zip">Time <span>*</span></label>
                                <input type="time" id="zip" name="time" placeholder="10001" value="{{ old('time') }}">
                                <p class="error_msg">@error('time'){{$message}}@enderror</p>
                            </div>
                        </div>


                        
                        <div class="row">
                            <div class="col-50">
                                <label for="state">Start Time <span>*</span></label>
                                <input type="time" id="state" name="start_time" value="{{ old('start_time') }}">
                                <p class="error_msg">@error('start_time'){{$message}}@enderror</p>
                            </div>
                            <div class="col-50">
                                <label for="zip">End Time <span>*</span></label>
                                <input type="time" id="zip" name="end_time" placeholder="10001" value="{{ old('end_time') }}">
                                <p class="error_msg">@error('end_time'){{$message}}@enderror</p>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-50">
                                <label for="adr">Required Care Taker Gender <span>*</span></label>
                                <select name="gender" id="gender">
                                    <option value="" disabled selected>Select Option</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                                <p class="error_msg">@error('gender'){{$message}}@enderror</p>
                            </div>
                            <div class="col-50">
                                <label for="adr">Care For <span>*</span></label>
                                <select name="carefor" id="cars">
                                    <option value="" selected>Select Family Member</option>
                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->relation }}</option>
                                    @endforeach
                                </select>
                                <p class="error_msg">@error('carefor'){{$message}}@enderror</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-50">
                                <label for="comment">Description <span></span></label>
                                <textarea name="description" id="" placeholder="Typer here...">{{ old('description') }}</textarea>
                                <p class="error_msg">@error('description'){{$message}}@enderror</p>
                            </div>
                        </div>

                    </div>
                    </div>

                    <div class="row">
                        <div class="col-50">
                            <input type="submit" value="Post Job" class="btn">
                        </div>
                    </div>


                    </div>
                </div>


                </form>

                </div>

            <!-- _____________________ showPostJob end -->
        </div>
     </div>

     <script>
        
        function showPostJob() {
            var x = document.getElementById("post_job_div");
            x.style.display = "flex";
            localStorage.setItem('show_create_job', '1');
        }
        
        function hidePostJob() {
            var x = document.getElementById("post_job_div");
            x.style.display = "none";
            localStorage.setItem('show_create_job', '0');
        }

        if(localStorage.getItem('show_create_job') !== null){
            if(localStorage.getItem('show_create_job')==='1'){
                showPostJob();
            }else{
                hidePostJob();
            }
        }       


    </script>
    <!-- ___________________________________ Post Job end -->

</div>
