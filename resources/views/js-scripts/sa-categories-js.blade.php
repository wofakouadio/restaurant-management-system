<script type="text/javascript">

    {{--  Alerts  --}}
    $(".category-alert").hide()

    // Add new Category
    $(document).on("submit", "#sa-new-category-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-new-category-form")[0]
        $.ajax({
            url:'{{route('sa.new-category')}}',
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data: new FormData(form_data),
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-new-category-form .category-alert").removeClass('alert-success')
                    $("#sa-new-category-form .category-alert").removeClass('alert-warning')
                    $("#sa-new-category-form .category-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-new-category-form .category-alert").removeClass('alert-danger')
                    $("#sa-new-category-form .category-alert").removeClass('alert-warning')

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
                $("#sa-new-category-form .category-alert").removeClass('alert-success')
                $("#sa-new-category-form .category-alert").removeClass('alert-danger')
                $("#sa-new-category-form .category-alert").show().addClass('alert-warning').html('Check in the forms for errors')

                if('name' in errorsCount){
                    $("#sa-new-category-form #category-name-err").html(errorsCount.name[0])
                }else{
                    $("#sa-new-category-form #category-name-err").html('')
                }
                // console.log(s)
                // console.log('errorMessage : ' + d)
                console.log(errorsCount)
                // console.log(f)
                // console.log('firstname' in errorsCount)
            }
        })
    })

    //Show Categoy Info in Edit Modal
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
                }
                console.log(response)
            }
        })
    })

</script>
