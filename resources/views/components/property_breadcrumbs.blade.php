<div class="bg-white  py-3 px-4 rounded-lg shadow">
    <section class="row justify-content-center">
        <div class="col-md-10">

            <div class="row">


                {{-- step1(home) --}}
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
                    <div class="{{ @$home == true ? 'text-primary' : 'text-gray-400' }}">
                        <i class="h2 border rounded-full p-1 ri-home-3-line"></i>
                        <p class="my-2">Property information</p>
                    </div>
                </div>

                {{-- step2(location) --}}
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
                    <div class="{{ @$location == true ? 'text-primary' : 'text-gray-400' }}">
                        <i class="h2 border rounded-full p-1 ri-home-3-line"></i>
                        <p class="my-2">Property Location</p>
                    </div>
                </div>

                {{-- step3(unit) --}}
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
                    <div class="{{ @$unit == true ? 'text-primary' : 'text-gray-400' }}">
                        <i class="h2 border rounded-full p-1 ri-home-3-line"></i>
                        <p class="my-2">Property Unit</p>
                    </div>
                </div>

                {{-- step4(rent charge) --}}
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center">
                    <div class="{{ @$rent == true ? 'text-primary' : 'text-gray-400' }}">
                        <i class="h2 border rounded-full p-1 ri-home-3-line"></i>
                        <p class="my-2">Rent & Charges</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
