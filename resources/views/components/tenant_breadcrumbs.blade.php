<div class="bg-white  py-3 px-4 rounded-lg shadow">
    <section class="row justify-content-center">
        <div class="  col-md-8 ">

            <div class="row">
                {{-- step1(home) --}}
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <div class="{{ @$tenant == true ? 'text-primary' : 'text-gray-400' }}">
                        <i class="h2 border rounded-full p-1 ri-account-circle-fill"></i>
                        <p class="my-2">Tenant Information</p>
                    </div>
                </div>

                {{-- step2(location) --}}
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <div class="{{ @$home == true ? 'text-primary' : 'text-gray-400' }}">
                        <i class="h2 border rounded-full p-1 ri-home-5-fill"></i>
                        <p class="my-2">Home Details</p>
                    </div>
                </div>

                {{-- step3(unit) --}}
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <div class="{{ @$document == true ? 'text-primary' : 'text-gray-400' }}">
                        <i class="h2 border rounded-full p-1 ri-file-copy-2-line"></i>
                        <p class="my-2">Documents</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
