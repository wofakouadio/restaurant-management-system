<script type="text/javascript">
    {{--  Alerts  --}}
    $(".order-alert").hide()
    $(".cart-alert").hide()

    $(document).ready((event)=>{
        {{-- get menu data in add to cart modal modal --}}
        $(document).on("show.bs.modal", "#AddToCart", (event)=>{
            let str = $(event.relatedTarget)
            let menu_id = str.data("menu_id")
            let modal = $("#AddToCart")
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
                        modal.find("input[name=price]").val(DecodedResults.data[0].price)
                    }
                }
            })
        })

        {{-- add new item to cart --}}
        $(document).on("submit", "#sa-add-to-cart-form", (e)=>{
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.add-item-to-cart')}}',
                method:'POST',
                cache:false,
                data: $("#sa-add-to-cart-form").serialize(),
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    if(DecodedResults.status === 201){
                        $("#sa-add-to-cart-form .order-alert").removeClass('alert-success')
                        $("#sa-add-to-cart-form .order-alert").removeClass('alert-warning')
                        $("#sa-add-to-cart-form .order-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                    }else{
                        $("#sa-add-to-cart-form .order-alert").removeClass('alert-danger')
                        $("#sa-add-to-cart-form .order-alert").removeClass('alert-warning')

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
                    $("#sa-add-to-cart-form .order-alert").removeClass('alert-success')
                    $("#sa-add-to-cart-form .order-alert").removeClass('alert-danger')

                    if('message' in errorsCount){
                        $("#sa-new-order-form .order-alert").show().addClass('alert-warning').html(errorsCount.message)
                    }else{
                        $("#sa-new-order-form .order-alert").show().addClass('alert-warning').html('Check in the forms for errors')
                    }
                }
            })
        })

        {{-- delete item from cart modal--}}
        $(document).on("show.bs.modal", "#DeleteCartItem", (event)=>{
            let str = $(event.relatedTarget)
            let cart_id = str.data("cart_id")
            let modal = $("#DeleteCartItem")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.get-cart-data')}}',
                method:'GET',
                cache:false,
                data: {cart_id:cart_id},
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    if(DecodedResults.status === 201){
                        modal.find(".cart-alert").removeClass('alert-success')
                        modal.find(".cart-alert").removeClass('alert-warning')
                        modal.find(".cart-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                    }else{
                        modal.find(".cart-alert").removeClass('alert-danger')
                        modal.find(".cart-alert").removeClass('alert-warning')
                        modal.find("input[name=cart_id]").val(cart_id)
                        modal.find(".remove-item-from-cart-notice").html('Are you sure of removing <b>' + DecodedResults.data[0].menu_name + '</b> from cart?')
                    }
                }
            })
        })

        {{-- delete item from cart form--}}
        $(document).on("submit", "#sa-delete-to-cart-form", (e)=>{
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.delete-item-from-cart')}}',
                method:'POST',
                cache:false,
                data: $("#sa-delete-to-cart-form").serialize(),
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    if(DecodedResults.status === 201){
                        $("#sa-delete-to-cart-form .cart-alert").removeClass('alert-success')
                        $("#sa-delete-to-cart-form .cart-alert").removeClass('alert-warning')
                        $("#sa-delete-to-cart-form .cart-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                    }else{
                        $("#sa-delete-to-cart-form .cart-alert").removeClass('alert-danger')
                        $("#sa-delete-to-cart-form .cart-alert").removeClass('alert-warning')

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
                    $("#sa-delete-to-cart-form .cart-alert").removeClass('alert-success')
                    $("#sa-delete-to-cart-form .cart-alert").removeClass('alert-danger')

                    if('message' in errorsCount){
                        $("#sa-delete-to-cart-form .cart-alert").show().addClass('alert-warning').html(errorsCount.message)
                    }else{
                        $("#sa-delete-to-cart-form .cart-alert").show().addClass('alert-warning').html('Check in the forms for errors')
                    }
                }
            })
        })

        {{-- get menu data in order modal --}}
        $(document).on("show.bs.modal", "#AddNewOrder", (event)=>{
            let str = $(event.relatedTarget)
            let user_id = str.data("user_id")
            let modal = $("#AddNewOrder")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.get-cart-items')}}',
                method:'GET',
                cache:false,
                data: {user_id:user_id},
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
                        modal.find("input[name=user_id]").val(user_id)
                        modal.find("#items-table").html(DecodedResults.data)
                        modal.find("input[name=items]").val(DecodedResults.encodedData)
                        modal.find("input[name=total]").val(DecodedResults.total)
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

                    if('items' in errorsCount){
                        $("#sa-new-order-form #items-err").html(errorsCount.items[0])
                    }else{
                        $("#sa-new-order-form #items-err").html('')
                    }

                    if('total' in errorsCount){
                        $("#sa-new-order-form #total-err").html(errorsCount.total[0])
                    }else{
                        $("#sa-new-order-form #total-err").html('')
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

        {{-- get order data in payment info --}}
        $(document).on("show.bs.modal", "#make-payment-order-modal", (event)=>{
            let str = $(event.relatedTarget)
            let order_id = str.data('order_id')
            let modal = $('#make-payment-order-modal')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.get-order-details')}}',
                method:'GET',
                cache:false,
                data:{order_id:order_id},
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    console.log(DecodedResults)
                    if(DecodedResults.status === 201){
                        modal.find(".order-alert").removeClass('alert-success')
                        modal.find(".order-alert").removeClass('alert-warning')
                        modal.find(".order-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                    }else{
                        modal.find(".order-alert").removeClass('alert-danger')
                        modal.find(".order-alert").removeClass('alert-warning')
                        modal.find("#order-details").html(DecodedResults.data)
                        // modal.find("input[name=menu_id]").val(menu_id)
                        // modal.find("input[name=name]").val(DecodedResults.data[0].name)
                        // modal.find("select[name=sub-cat-id]").val(DecodedResults.data[0].sub_cat_id)
                        // modal.find("input[name=fetched-picture]").val(DecodedResults.data[0].image)
                        // modal.find("select[name=cat-id]").val(DecodedResults.data[0].cat_id)
                        // modal.find("textarea[name=description]").val(DecodedResults.data[0].description)
                        // modal.find("textarea[name=extra]").val(DecodedResults.data[0].extra)
                        // modal.find("input[name=price]").val(DecodedResults.data[0].price)
                        // modal.find("input[name=discount]").val(DecodedResults.data[0].discount)
                        // modal.find("select[name=status]").val(DecodedResults.data[0].status)
                    }
                }
            })
        })

        {{-- delete Order Modal --}}
        $(document).on("show.bs.modal", "#cancel-order-modal", (event)=>{
            let str = $(event.relatedTarget)
            let order_id = str.data('order_id')
            let modal = $('#cancel-order-modal')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.get-order')}}',
                method:'GET',
                cache:false,
                data:{order_id:order_id},
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
                        modal.find("input[name=order_id]").val(order_id)
                        modal.find(".cancel-order-notice").html("Are you sure of cancelling Order Number " + order_id + " ?")
                        modal.find("#items-details").html(DecodedResults.data)
                    }
                }
            })
        })

        {{-- Delete Order Form --}}
        $(document).on("submit", "#sa-cancel-order-form", (e)=>{
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{route('sa.delete-order')}}',
                method:'POST',
                cache:false,
                data:$("#sa-cancel-order-form").serialize(),
                success:(response)=>{
                    let StringResults = JSON.stringify(response)
                    let DecodedResults = JSON.parse(StringResults)
                    if(DecodedResults.status === 201){
                        $("#sa-cancel-order-form .order-alert").removeClass('alert-success')
                        $("#sa-cancel-order-form .order-alert").removeClass('alert-warning')
                        $("#sa-cancel-order-form .order-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                    }else{
                        $("#sa-cancel-order-form .order-alert").removeClass('alert-danger')
                        $("#sa-cancel-order-form .order-alert").removeClass('alert-warning')

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
                    $("#sa-cancel-order-form .order-alert").removeClass('alert-success')
                    $("#sa-cancel-order-form .order-alert").removeClass('alert-danger')

                    if('message' in errorsCount){
                        $("#sa-cancel-order-form .order-alert").show().addClass('alert-warning').html(errorsCount.message)
                    }else{
                        $("#sa-cancel-order-form .order-alert").show().addClass('alert-warning').html(errorsCount.message)
                    }
                }
            })
        })
    })
</script>
