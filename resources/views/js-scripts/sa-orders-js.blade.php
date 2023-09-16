<script type="text/javascript">
    {{--  Alerts  --}}
    $(".order-alert").hide()

    $(document).ready((event)=>{
        {{-- get menu data in order modal --}}
        $(document).on("show.bs.modal", "#AddNewOrder", (event)=>{
            let str = $(event.relatedTarget)
            let menu_id = str.data("menu_id")
            let modal = $("#AddNewOrder")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.get-menu')}}',
                method:'GET',
                cache:false,
                data: {menu_id:menu_id},
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    if(DecodedResults.status === 201){
                        modal.find(".order-alert").removeClass('alert-success')
                        modal.find(".order-alert").removeClass('alert-warning')
                        modal.find(".order-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                    }else{
                        modal.find(".order-alert").removeClass('alert-danger')
                        modal.find(".order-alert").removeClass('alert-warning')
                        modal.find("input[name=menu_id]").val(menu_id)
                        modal.find("input[name=name]").val(DecodedResults.data[0].name)
                        modal.find("textarea[name=description]").val(DecodedResults.data[0].description)
                        modal.find("input[name=price]").val(DecodedResults.data[0].price)
                    }
                }
            })
        })

        {{-- add new order --}}
        $(document).on("submit", "#sa-new-order-form", (e)=>{
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.add-new-order')}}',
                method:'POST',
                cache:false,
                data: $("#sa-new-order-form").serialize(),
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    if(DecodedResults.status === 201){
                        $("#sa-new-order-form .order-alert").removeClass('alert-success')
                        $("#sa-new-order-form .order-alert").removeClass('alert-warning')
                        $("#sa-new-order-form .order-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                    }else{
                        $("#sa-new-order-form .order-alert").removeClass('alert-danger')
                        $("#sa-new-order-form .order-alert").removeClass('alert-warning')

                        Swal.fire({
                            title: 'Notification',
                            html: DecodedResults.msg,
                            icon: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            confirmButtonText: 'Close',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload()
                            }
                        })
                    }
                },
                error:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    let errorsCount = DecodedResults.responseJSON.errors
                    $("#sa-new-order-form .order-alert").removeClass('alert-success')
                    $("#sa-new-order-form .order-alert").removeClass('alert-danger')

                    if('message' in errorsCount){
                        $("#sa-new-order-form .order-alert").show().addClass('alert-warning').html(errorsCount.message)
                    }else{
                        $("#sa-new-order-form .order-alert").show().addClass('alert-warning').html('Check in the forms for errors')
                    }

                    if('name' in errorsCount){
                        $("#sa-new-order-form #name-err").html(errorsCount.name[0])
                    }else{
                        $("#sa-new-order-form #name-err").html('')
                    }

                    if('quantity' in errorsCount){
                        $("#sa-new-order-form #quantity-err").html(errorsCount.quantity[0])
                    }else{
                        $("#sa-new-order-form #quantity-err").html('')
                    }

                    if('description' in errorsCount){
                        $("#sa-new-order-form #description-err").html(errorsCount.description[0])
                    }else{
                        $("#sa-new-order-form #description-err").html('')
                    }

                    if('price' in errorsCount){
                        $("#sa-new-order-form #price-err").html(errorsCount.price[0])
                    }else{
                        $("#sa-new-order-form #price-err").html('')
                    }

                    if('remarks' in errorsCount){
                        $("#sa-new-order-form #remarks-err").html(errorsCount.remarks[0])
                    }else{
                        $("#sa-new-order-form #remarks-err").html('')
                    }

                    if('payment_method' in errorsCount){
                        $("#sa-new-order-form #payment-method-err").html(errorsCount.payment_method[0])
                    }else{
                        $("#sa-new-order-form #payment-method-err").html('')
                    }

                }
            })
        })
    })
</script>
