<script type="text/javascript">
    $(document).ready((e)=>{
        {{-- Alerts --}}
        $(".payment-alert").hide()
        //     $(".payment-alert").addClass("alert-success").html('<div class="alert alert-success d-flex align-items-center" role="alert"><i class="fa fa-fw fa-check me-2"></i><p class="mb-0">This is a successful message with a <a class="alert-link" href="javascript:void(0)">link</a>!</p></div>')
        {{-- Pay for order --}}
        $(document).on("submit", "#order-payment-form", (e)=>{
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.pay')}}',
                method:'POST',
                cache: false,
                data: $("#order-payment-form").serialize(),
                beforeSend:()=>{
                    Swal.fire({
                        html: 'Processing Payment',
                        iconHtml: '<img src="{{asset('assets/media/payments/payment.png')}}" alt="payment_logo" width="65px">',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton:false
                    })
                },
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    if(DecodedResults.status === 201){

                    }else{
                        Swal.fire({
                            html: 'Payment Done Successfully',
                            icon: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            confirmButtonText: 'Close',
                        })
                    }
                    // Swal.fire({
                    //     html: 'Payment Done Successfully',
                    //     icon: 'success',
                    //     allowOutsideClick: false,
                    //     allowEscapeKey: false,
                    //     confirmButtonText: 'Close',
                    // }).then((result) => {
                    //     if (result.isConfirmed) {
                    //         // window.location.reload()
                    //     }
                    // })
                    console.log(response)
                },
                error:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    let errorsCount = DecodedResults.responseJSON.errors
                    console.log(response)
                }
            })
        })
    })
</script>
