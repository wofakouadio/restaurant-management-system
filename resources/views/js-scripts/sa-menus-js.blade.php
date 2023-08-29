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

</script>
