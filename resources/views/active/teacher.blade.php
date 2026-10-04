<x-active-bootstrap title="index">
    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1>อาจารย์ประจำหลักสูตร</h1>
        </div>
        <section class="text-center">
            <!-- T1 -->
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-2 gutter-2">
                @foreach ($teachers as $row)
                <div class="col p-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100">
                        <div class="row no-gutters">
                            <div class="col-xl-5 col-lg-2 col-md-4">
                                <img src="{{ $row->image}}" class="img-fluid" alt="">
                            </div>
                            <div class="col-xl-7 col-lg-10 col-md-8">
                                <div class="card-body">
                                    <h5 style="font-size: 1.2rem;">{{ $row->name}}</h5>
                                    <div class="text-black-50 prompt">{{ $row->role}}</div>
                                    <div>
                                        @foreach (explode(" | ",$row->education) as $edu)
                                        <div>
                                            <sup>{{ $loop->iteration }}</sup> {{ $edu }}
                                        </div>
                                        @endforeach

                                    </div>
                                    <!-- <div>  </div> -->
                                    <div class="text-black-50"><i class="fa fa-map-marker"></i> {{ $row->office}}</div>
                                    <div class="text-black-50"> <label>{{ $row->email}} </label></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Team Member-->
                @endforeach
            </div>
        </section>
    </div>
</x-active-bootstrap>