<script type="text/javascript">

    {{--  Alerts  --}}
    $(".menu-alert").hide()

    {{-- Functions --}}
    function SubCategoriesBasedOnCategory(category_id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let response = ''
        $.ajax({
            url:'{{route('sa.sub-categories-dropdown-based-on-category')}}',
            method:'GET',
            cache:false,
            async: false,
            data:{'cat-id': category_id},
            success:(Response)=>{
                response = Response
            }
        })
        return response
    }

    {{-- SubCategories based on category --}}
    $(document).on("change", "#sa-new-menu-form select[name=cat-id]", (e)=>{
        let cat_id = $("#sa-new-menu-form select[name=cat-id]").val()
        $("#sa-new-menu-form select[name=sub-cat-id]").html(SubCategoriesBasedOnCategory(cat_id))
    })

    $(document).on("change", "#edit-menu-modal select[name=cat-id]", (e)=>{
        let cat_id = $("#edit-menu-modal select[name=cat-id]").val()
        $("#sa-update-menu-form select[name=sub-cat-id]").html(SubCategoriesBasedOnCategory(cat_id))
    })

    {{-- Add New Menu --}}
    $(document).on("submit", "#sa-new-menu-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-new-menu-form")[0]
        $.ajax({
            url:'{{route('sa.add-new-menu')}}',
            method:'POST',
            cache:false,
            data: new FormData(form_data),
            contentType:false,
            processData:false,
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-new-menu-form .menu-alert").removeClass('alert-success')
                    $("#sa-new-menu-form .menu-alert").removeClass('alert-warning')
                    $("#sa-new-menu-form .menu-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-new-menu-form .menu-alert").removeClass('alert-danger')
                    $("#sa-new-menu-form .menu-alert").removeClass('alert-warning')

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
                $("#sa-new-menu-form .menu-alert").removeClass('alert-success')
                $("#sa-new-menu-form .menu-alert").removeClass('alert-danger')

                if('message' in errorsCount){
                    $("#sa-new-menu-form .menu-alert").show().addClass('alert-warning').html(errorsCount.message)
                }else{
                    $("#sa-new-menu-form .menu-alert").show().addClass('alert-warning').html('Check in the forms for errors')
                }

                if('name' in errorsCount){
                    $("#sa-new-menu-form #name-err").html(errorsCount.name[0])
                }else{
                    $("#sa-new-menu-form #name-err").html('')
                }

                if('cat-id' in errorsCount){
                    $("#sa-new-menu-form #category-err").html("The Category is required")
                }else{
                    $("#sa-new-menu-form #category-err").html('')
                }

                if('sub-cat-id' in errorsCount){
                    $("#sa-new-menu-form #sub-category-err").html("The Sub-Category is required")
                }else{
                    $("#sa-new-menu-form #sub-category-err").html('')
                }

                if('description' in errorsCount){
                    $("#sa-new-menu-form #description-err").html(errorsCount.description[0])
                }else{
                    $("#sa-new-menu-form #description-err").html('')
                }

                if('price' in errorsCount){
                    $("#sa-new-menu-form #price-err").html(errorsCount.price[0])
                }else{
                    $("#sa-new-menu-form #price-err").html('')
                }

                if('discount' in errorsCount){
                    $("#sa-new-menu-form #discount-err").html(errorsCount.discount[0])
                }else{
                    $("#sa-new-menu-form #discount-err").html('')
                }

                if('status' in errorsCount){
                    $("#sa-new-menu-form #status-err").html(errorsCount.status[0])
                }else{
                    $("#sa-new-menu-form #status-err").html('')
                }

            }
        })
    })

    {{-- Edit Menu Modal --}}
    $(document).on("show.bs.modal", "#edit-menu-modal", (event)=>{
        let str = $(event.relatedTarget)
        let menu_id = str.data("menu_id")
        let modal = $("#edit-menu-modal")
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
                    modal.find(".menu-alert").removeClass('alert-success')
                    modal.find(".menu-alert").removeClass('alert-warning')
                    modal.find(".menu-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    modal.find(".menu-alert").removeClass('alert-danger')
                    modal.find(".menu-alert").removeClass('alert-warning')
                    modal.find("input[name=menu_id]").val(menu_id)
                    modal.find("input[name=name]").val(DecodedResults.data[0].name)
                    modal.find("select[name=sub-cat-id]").val(DecodedResults.data[0].sub_cat_id)
                    modal.find("input[name=fetched-picture]").val(DecodedResults.data[0].image)
                    modal.find("select[name=cat-id]").val(DecodedResults.data[0].cat_id)
                    modal.find("textarea[name=description]").val(DecodedResults.data[0].description)
                    modal.find("textarea[name=extra]").val(DecodedResults.data[0].extra)
                    modal.find("input[name=price]").val(DecodedResults.data[0].price)
                    modal.find("input[name=discount]").val(DecodedResults.data[0].discount)
                    modal.find("select[name=status]").val(DecodedResults.data[0].status)
                }
            }
        })
    })

    {{-- Delete Menu Modal --}}
    $(document).on("show.bs.modal", "#delete-menu-modal", (event)=>{
        let str = $(event.relatedTarget)
        let menu_id = str.data("menu_id")
        let modal = $("#delete-menu-modal")
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
                    modal.find(".menu-alert").removeClass('alert-success')
                    modal.find(".menu-alert").removeClass('alert-warning')
                    modal.find(".menu-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    modal.find(".menu-alert").removeClass('alert-danger')
                    modal.find(".menu-alert").removeClass('alert-warning')
                    modal.find("#delete-notice").html("Are you sure of deleting " +DecodedResults.data[0].name+ " ?")
                    modal.find("input[name=menu_id]").val(menu_id)
                }
            }
        })
    })

    {{-- Update Menu --}}
    $(document).on("submit", "#sa-update-menu-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-update-menu-form")[0]
        $.ajax({
            url:'{{route('sa.update-menu')}}',
            method:'POST',
            cache:false,
            data: new FormData(form_data),
            contentType:false,
            processData:false,
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-update-menu-form .menu-alert").removeClass('alert-success')
                    $("#sa-update-menu-form .menu-alert").removeClass('alert-warning')
                    $("#sa-update-menu-form .menu-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-update-menu-form .menu-alert").removeClass('alert-danger')
                    $("#sa-update-menu-form .menu-alert").removeClass('alert-warning')

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
                $("#sa-update-menu-form .menu-alert").removeClass('alert-success')
                $("#sa-update-menu-form .menu-alert").removeClass('alert-danger')

                if('message' in errorsCount){
                    $("#sa-update-menu-form .menu-alert").show().addClass('alert-warning').html(errorsCount.message)
                }else{
                    $("#sa-update-menu-form .menu-alert").show().addClass('alert-warning').html('Check in the forms for errors')
                }

                if('name' in errorsCount){
                    $("#sa-update-menu-form #name-err").html(errorsCount.name[0])
                }else{
                    $("#sa-update-menu-form #name-err").html('')
                }

                if('cat-id' in errorsCount){
                    $("#sa-update-menu-form #category-err").html("The Category is required")
                }else{
                    $("#sa-update-menu-form #category-err").html('')
                }

                if('sub-cat-id' in errorsCount){
                    $("#sa-update-menu-form #sub-category-err").html("The Sub-Category is required")
                }else{
                    $("#sa-update-menu-form #sub-category-err").html('')
                }

                if('description' in errorsCount){
                    $("#sa-update-menu-form #description-err").html(errorsCount.description[0])
                }else{
                    $("#sa-update-menu-form #description-err").html('')
                }

                if('price' in errorsCount){
                    $("#sa-update-menu-form #price-err").html(errorsCount.price[0])
                }else{
                    $("#sa-update-menu-form #price-err").html('')
                }

                if('discount' in errorsCount){
                    $("#sa-update-menu-form #discount-err").html(errorsCount.discount[0])
                }else{
                    $("#sa-update-menu-form #discount-err").html('')
                }

                if('status' in errorsCount){
                    $("#sa-update-menu-form #status-err").html(errorsCount.status[0])
                }else{
                    $("#sa-update-menu-form #status-err").html('')
                }

            }
        })
    })

    {{-- Delete Menu --}}
    $(document).on("submit", "#sa-delete-menu-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.delete-menu')}}',
            method:'POST',
            cache:false,
            data: $("#sa-delete-menu-form").serialize(),
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-delete-menu-form .menu-alert").removeClass('alert-success')
                    $("#sa-delete-menu-form .menu-alert").removeClass('alert-warning')
                    $("#sa-delete-menu-form .menu-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-delete-menu-form .menu-alert").removeClass('alert-danger')
                    $("#sa-delete-menu-form .menu-alert").removeClass('alert-warning')

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
            }
        })
    })
</script>
