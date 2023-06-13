<x-web-layout title="checkout">
    <div class="bread-crumb">
		<img src="{{ asset('assets/images/banner_top.jpg') }}" class="img-responsive" alt="banner-top" title="banner-top">
		<div class="container">
			<div class="matter">
				<h2>Shopping Cart</h2>
				<ul class="list-inline">
					<li><a href="{{ (url('/')) }}">HOME</a></li>
					<li><a href="{{ url('/daftarmenu') }}">Shopping Cart</a></li>
				</ul>
			</div>
		</div>
	</div>
    <div class="mycart">
        <div class="container">
            <div class="row">
                <form method="post" id="form" enctype="multipart/form-data" action="{{ route('web.checkout.updateCustomer') }}">
                    @csrf
                    <div class="tab-pane col-md-12 col-sm-12 col-xs-12" id="tab-info">
                        <div class="col-md-5 col-sm-5 col-xs-12 padd0">
                            <h6>Contact Information</h6>
                                <fieldset>
                                    <!-- Form input fields for shopping address -->
                                    <div class="form-group">
                                        <input name="namalengkap" value="{{ Auth::user()->namalengkap }}" placeholder="Nama Lengkap" id="input-namalengkap" class="form-control" type="text" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" value="{{ Auth::user()->email }}" placeholder="Email" id="input-email" class="form-control" type="text" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input name="nomorhp" value="{{ Auth::user()->nomorhp }}" placeholder="Nomor HP" id="input-nomorhp" class="form-control" type="text" readonly>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="col-md-2 col-sm-2 co-xs-12"></div>
                        <div class="col-md-5 col-sm-5 col-xs-12 padd0">
                            <h6>Shopping Address</h6>
                        
                                <fieldset>	
                                    <div class="form-group">
                                        <input name="city" value="{{ Auth::user()->city }}" placeholder="City" id="input-city" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input name="address" value="{{ Auth::user()->address }}" placeholder="address" id="input-address" class="form-control" type="text">
                                    </div>
                                </fieldset>
                            
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 padd0">
                            <div class="buttons pull-right">
                            <button  type="submit" class="btn btn-primary">Payment Method</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('script')
        <script>
                $('#form').on('submit', function(event){
                    event.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: "{{ route('web.checkout.updateCustomer') }}",
                        type: "POST",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.alert == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href =
                                            "{{ route('web.checkout.payment') }}";
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                })
                            }
                        }
                    });
                });
            
        </script>
    @endsection
</x-web-layout>