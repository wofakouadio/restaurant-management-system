<script type="text/javascript">

    {{--  Alerts  --}}
    $(".sub-category-alert").hide()

    // Add new Category
    $(document).on("submit", "#sa-new-sub-category-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-new-sub-category-form")[0]
        $.ajax({
            url:'{{route('sa.new-sub-category')}}',
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data: new FormData(form_data),
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-new-sub-category-form .sub-category-alert").removeClass('alert-success')
                    $("#sa-new-sub-category-form .sub-category-alert").removeClass('alert-warning')
                    $("#sa-new-sub-category-form .sub-category-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-new-sub-category-form .sub-category-alert").removeClass('alert-danger')
                    $("#sa-new-sub-category-form .sub-category-alert").removeClass('alert-warning')

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
                $("#sa-new-sub-category-form .sub-category-alert").removeClass('alert-success')
                $("#sa-new-sub-category-form .sub-category-alert").removeClass('alert-danger')

                if('message' in errorsCount){
                    $("#sa-new-sub-category-form .sub-category-alert").show().addClass('alert-warning').html(errorsCount.message)
                }else{
                    $("#sa-new-sub-category-form .sub-category-alert").show().addClass('alert-warning').html('Check in the forms for errors')
                }

                if('name' in errorsCount){
                    $("#sa-new-sub-category-form #sub-category-name-err").html(errorsCount.name[0])
                }else{
                    $("#sa-new-sub-category-form #sub-category-name-err").html('')
                }

                if('cat-id' in errorsCount){
                    $("#sa-new-sub-category-form #category-name-err").html("The Category is required")
                }else{
                    $("#sa-new-sub-category-form #category-name-err").html('')
                }
                // console.log(s)
                // console.log('errorMessage : ' + d)
                // console.log(errorsCount)
                // console.log(f)
                // console.log('firstname' in errorsCount)
            }
        })
    })

    //Show Category Info in Edit Modal
    $(document).on("show.bs.modal", "#edit-category-modal", (event)=>{
        let str = $(event.relatedTarget)
        let cat_id = str.data('cat_id')
        let modal = $("#edit-category-modal")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-category')}}',
            method:'GET',
            cache:false,
            data: {cat_id:cat_id},
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    modal.find(".category-alert").removeClass('alert-success')
                    modal.find(".category-alert").removeClass('alert-warning')
                    modal.find(".category-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    modal.find(".category-alert").removeClass('alert-danger')
                    modal.find(".category-alert").removeClass('alert-warning')
                    modal.find("input[name=name]").val(DecodedResults.data[0].name)
                    modal.find("input[name=cat_id]").val(DecodedResults.data[0].cat_id)
                    modal.find(".cat-profile-picture").html('<img src="../storage/'+DecodedResults.data[0].image+'" class="img" width="200px"/>')
                    modal.find("input[name=fetched-image]").val(DecodedResults.data[0].image)
                }
            }
        })
    })

    // Show Category Info in Delete Modal
    $(document).on("show.bs.modal", "#delete-category-modal", (event)=>{
        let str = $(event.relatedTarget)
        let cat_id = str.data('cat_id')
        let modal = $("#delete-category-modal")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-category')}}',
            method:'GET',
            cache:false,
            data: {cat_id:cat_id},
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    modal.find(".category-alert").removeClass('alert-success')
                    modal.find(".category-alert").removeClass('alert-warning')
                    modal.modal('hide')
                }else{
                    modal.find(".category-alert").removeClass('alert-danger')
                    modal.find(".category-alert").removeClass('alert-warning')
                    modal.find("#delete-notice").html("Are you sure of deleting " +DecodedResults.data[0].name + " category ?")
                    modal.find("input[name=cat-id]").val(DecodedResults.data[0].cat_id)
                }
            }
        })
    })

    //Update Category Info in Edit modal
    $(document).on("submit", "#sa-update-category-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-update-category-form")[0]
        $.ajax({
            url:'{{route('sa.update-category')}}',
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data: new FormData(form_data),
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-update-category-form .category-alert").removeClass('alert-success')
                    $("#sa-update-category-form .category-alert").removeClass('alert-warning')
                    $("#sa-update-category-form .category-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-update-category-form .category-alert").removeClass('alert-danger')
                    $("#sa-update-category-form .category-alert").removeClass('alert-warning')

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
                $("#sa-update-category-form .category-alert").removeClass('alert-success')
                $("#sa-update-category-form .category-alert").removeClass('alert-danger')
                $("#sa-update-category-form .category-alert").show().addClass('alert-warning').html('Check in the forms for errors')

                if('name' in errorsCount){
                    $("#sa-update-category-form #category-name-err").html(errorsCount.name[0])
                }else{
                    $("#sa-update-category-form #category-name-err").html('')
                }
                // console.log(s)
                // console.log('errorMessage : ' + d)
                console.log(errorsCount)
                // console.log(f)
                // console.log('firstname' in errorsCount)
            }
        })
    })

    // Delete Category Info in Delete modal
    $(document).on("submit", "#sa-delete-category-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.delete-category')}}',
            method:'POST',
            cache:false,
            data: $("#sa-delete-category-form").serialize(),
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-delete-category-form .category-alert").removeClass('alert-success')
                    $("#sa-delete-category-form .category-alert").removeClass('alert-warning')
                    $("#sa-delete-category-form .category-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-delete-category-form .category-alert").removeClass('alert-danger')
                    $("#sa-delete-category-form .category-alert").removeClass('alert-warning')

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
