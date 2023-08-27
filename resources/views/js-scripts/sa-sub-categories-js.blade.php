<script type="text/javascript">

    {{--  Alerts  --}}
    $(".sub-category-alert").hide()

    // Add new Sub-Category
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

    //Show Sub-Category Info in Edit Modal
    $(document).on("show.bs.modal", "#edit-sub-category-modal", (event)=>{
        let str = $(event.relatedTarget)
        let sub_cat_id = str.data('sub_cat_id')
        let modal = $("#edit-sub-category-modal")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-sub-category')}}',
            method:'GET',
            cache:false,
            data: {sub_cat_id:sub_cat_id},
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    modal.find(".sub-category-alert").removeClass('alert-success')
                    modal.find(".sub-category-alert").removeClass('alert-warning')
                    modal.find(".sub-category-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    modal.find(".sub-category-alert").removeClass('alert-danger')
                    modal.find(".sub-category-alert").removeClass('alert-warning')
                    modal.find("input[name=name]").val(DecodedResults.data[0].name)
                    modal.find("input[name=sub_cat_id]").val(DecodedResults.data[0].sub_cat_id)
                    modal.find(".cat-profile-picture").html('<img src="../storage/'+DecodedResults.data[0].image+'" class="img" width="200px"/>')
                    modal.find("input[name=fetched-image]").val(DecodedResults.data[0].image)
                    modal.find("select[name=cat-id]").val(DecodedResults.data[0].cat_id)
                }
            }
        })
    })

    // Show Sub-Category Info in Delete Modal
    $(document).on("show.bs.modal", "#delete-sub-category-modal", (event)=>{
        let str = $(event.relatedTarget)
        let sub_cat_id = str.data('sub_cat_id')
        let modal = $("#delete-sub-category-modal")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-sub-category')}}',
            method:'GET',
            cache:false,
            data: {sub_cat_id:sub_cat_id},
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    modal.find(".sub-category-alert").removeClass('alert-success')
                    modal.find(".sub-category-alert").removeClass('alert-warning')
                    modal.modal('hide')
                }else{
                    modal.find(".sub-category-alert").removeClass('alert-danger')
                    modal.find(".sub-category-alert").removeClass('alert-warning')
                    modal.find("#delete-notice").html("Are you sure of deleting " +DecodedResults.data[0].name + " sub-category ?")
                    modal.find("input[name=sub-cat-id]").val(DecodedResults.data[0].sub_cat_id)
                }
            }
        })
    })

    //Update Sub-Category Info in Edit modal
    $(document).on("submit", "#sa-update-sub-category-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-update-sub-category-form")[0]
        $.ajax({
            url:'{{route('sa.update-sub-category')}}',
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data: new FormData(form_data),
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-update-sub-category-form .sub-category-alert").removeClass('alert-success')
                    $("#sa-update-sub-category-form .sub-category-alert").removeClass('alert-warning')
                    $("#sa-update-sub-category-form .sub-category-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-update-sub-category-form .sub-category-alert").removeClass('alert-danger')
                    $("#sa-update-sub-category-form .sub-category-alert").removeClass('alert-warning')

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
                $("#sa-update-sub-category-form .sub-category-alert").removeClass('alert-success')
                $("#sa-update-sub-category-form .sub-category-alert").removeClass('alert-danger')
                $("#sa-update-sub-category-form .sub-category-alert").show().addClass('alert-warning').html('Check in the forms for errors')

                if('name' in errorsCount){
                    $("#sa-update-sub-category-form #sub-category-name-err").html(errorsCount.name[0])
                }else{
                    $("#sa-update-sub-category-form #sub-category-name-err").html('')
                }

                if('cat-id' in errorsCount){
                    $("#sa-update-sub-category-form #sub-category-name-err").html(errorsCount.name[0])
                }else{
                    $("#sa-update-sub-category-form #sub-category-name-err").html('')
                }
                // console.log(s)
                // console.log('errorMessage : ' + d)
                // console.log(errorsCount)
                // console.log(f)
                // console.log('firstname' in errorsCount)
            }
        })
    })

    // Delete Sub-Category Info in Delete modal
    $(document).on("submit", "#sa-delete-sub-category-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.delete-sub-category')}}',
            method:'POST',
            cache:false,
            data: $("#sa-delete-sub-category-form").serialize(),
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
