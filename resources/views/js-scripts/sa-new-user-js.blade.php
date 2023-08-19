<script type="text/javascript">

    //function to reload / refresh a page
    // const RefreshPage = () =>{
    //
    // }

    $("#sa-new-user-form #new-user-form-alert").hide()
    $(document).on("submit", "#sa-new-user-form", (e)=>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-new-user-form")[0]
        e.preventDefault()
        $.ajax({
            url:'{{route('sa.register-new-user')}}',
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data: new FormData(form_data),
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-new-user-form #new-user-form-alert").removeClass('alert-success')
                    $("#sa-new-user-form #new-user-form-alert").removeClass('alert-warning')
                    $("#sa-new-user-form #new-user-form-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-new-user-form #new-user-form-alert").removeClass('alert-danger')
                    $("#sa-new-user-form #new-user-form-alert").removeClass('alert-warning')
                    // $("#sa-new-user-form #new-user-form-alert").show().addClass('alert-success').html(DecodedResults.msg)

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
                // console.log('Message : ' + s)
                // alert(c.image)
            },
            error:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                let errorsCount = DecodedResults.responseJSON.errors
                $("#sa-new-user-form #new-user-form-alert").removeClass('alert-success')
                $("#sa-new-user-form #new-user-form-alert").removeClass('alert-danger')
                $("#sa-new-user-form #new-user-form-alert").show().addClass('alert-warning').html('Check in the forms for errors')

                if('firstname' in errorsCount){
                    $("#sa-new-user-form #firstname-err").html(errorsCount.firstname[0])
                }else{
                    $("#sa-new-user-form #firstname-err").html('')
                }

                if('lastname' in errorsCount){
                    $("#sa-new-user-form #lastname-err").html(errorsCount.lastname[0])
                }else{
                    $("#sa-new-user-form #lastname-err").html('')
                }

                if('dob' in errorsCount){
                    $("#sa-new-user-form #dob-err").html(errorsCount.dob[0])
                }else{
                    $("#sa-new-user-form #dob-err").html('')
                }

                if('placeofbirth' in errorsCount){
                    $("#sa-new-user-form #placeofbirth-err").html('The Place of Birth field is required.')
                }else{
                    $("#sa-new-user-form #placeofbirth-err").html('')
                }

                if('gender' in errorsCount){
                    $("#sa-new-user-form #gender-err").html(errorsCount.gender[0])
                }else{
                    $("#sa-new-user-form #gender-err").html('')
                }

                if('address' in errorsCount){
                    $("#sa-new-user-form #main-address-err").html(errorsCount.address[0])
                }else{
                    $("#sa-new-user-form #main-address-err").html('')
                }

                if('email' in errorsCount){
                    $("#sa-new-user-form #email-address-err").html(errorsCount.email[0])
                }else{
                    $("#sa-new-user-form #email-address-err").html('')
                }

                if('username' in errorsCount){
                    $("#sa-new-user-form #username-err").html(errorsCount.username[0])
                }else{
                    $("#sa-new-user-form #username-err").html('')
                }

                if('role' in errorsCount){
                    $("#sa-new-user-form #role-type-err").html(errorsCount.role[0])
                }else{
                    $("#sa-new-user-form #role-type-err").html('')
                }

                if('contact' in errorsCount){
                    $("#sa-new-user-form #main-contact-err").html(errorsCount.contact[0])
                }else{
                    $("#sa-new-user-form #main-contact-err").html('')
                }

                // console.log(s)
                // console.log('errorMessage : ' + d)
                console.log(errorsCount)
                // console.log(f)
                // console.log('firstname' in errorsCount)
            }
        })
    })

    // $(document).on("change", "select[name=gender]", (e)=>{
    //     e.preventDefault()
    //     console.log($("select[name=gender]").val())
    // })
    //
    // $(document).on("click", "#btn-new-user", (e)=>{
    //     e.preventDefault()
    //     Swal.fire({
    //         title: 'Error!',
    //         text: 'Do you want to continue to test the sweetalert how sweet is it',
    //         icon: 'error',
    //         confirmButtonText: 'Cool'
    //     })
    // })
</script>
