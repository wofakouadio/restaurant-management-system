<script type="text/javascript">

    // Add new user
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

    // show edit user modal form
    $("#sa-update-user-form #update-user-form-alert").hide()
    $(document).on("show.bs.modal", "#edit-user-modal-form", (event)=>{
        let modal = $("#edit-user-modal-form")
        let str = $(event.relatedTarget)
        let user_id = str.data("user_id")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-user')}}',
            method:'GET',
            cache:false,
            data: {'user_id' : user_id},
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                // console.log(DecodedResults)
                if(DecodedResults.status === 201){
                    $("#sa-update-user-form #update-user-form-alert").show().addClass("alert-warning").html(DecodedResults.msg)
                    $("#sa-update-user-form #update-user-form-alert").removeClass("alert-danger").html('')
                }else{
                    $("#sa-update-user-form #update-user-form-alert").removeClass("alert-warning").html('')
                    $("#sa-update-user-form #update-user-form-alert").removeClass("alert-danger").html('')
                    modal.find("input[name=firstname]").val(DecodedResults.data[0].sur_name)
                    modal.find("input[name=user-id]").val(DecodedResults.data[0].userid)
                    modal.find("input[name=middlename]").val(DecodedResults.data[0].middle_name)
                    modal.find("input[name=lastname]").val(DecodedResults.data[0].last_name)
                    modal.find("input[name=dob]").val(DecodedResults.data[0].dob)
                    modal.find("input[name=placeofbirth]").val(DecodedResults.data[0].place_of_birth)
                    modal.find("select[name=gender]").val(DecodedResults.data[0].gender)
                    modal.find("input[name=address]").val(DecodedResults.data[0].main_address)
                    modal.find("input[name=secondary-address]").val(DecodedResults.data[0].secondary_address)
                    modal.find("input[name=contact]").val(DecodedResults.data[0].primary_contact)
                    modal.find("input[name=secondary-contact]").val(DecodedResults.data[0].secondary_contact)
                    modal.find("input[name=email]").val(DecodedResults.data[0].email)
                    modal.find("input[name=username]").val(DecodedResults.data[0].username)
                    modal.find("input[name=user-profile-picture]").val(DecodedResults.data[0].profile_picture)
                    modal.find(".user-profile-picture").html('<img src="../storage/'+DecodedResults.data[0].profile_picture+'" class="img" width="512px"/>')
                    modal.find("select[name=role]").val(DecodedResults.data[0].role_type)
                }
            }
        })

    })

    // update user info from edit user modal form
    $(document).on("submit", "#sa-update-user-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form_data = $("#sa-update-user-form")[0]
        $.ajax({
            url:'{{route('sa.update-user')}}',
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data: new FormData(form_data),
            beforeSend:()=>{
                Swal.fire({
                    title: 'Notification',
                    html: "Sit tight as we update the record",
                    icon: 'info',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false
                })
            },
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-update-user-form #update-user-form-alert").removeClass('alert-success')
                    $("#sa-update-user-form #update-user-form-alert").removeClass('alert-warning')
                    $("#sa-update-user-form #update-user-form-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-update-user-form #update-user-form-alert").removeClass('alert-danger')
                    $("#sa-update-user-form #update-user-form-alert").removeClass('alert-warning')
                    // $("#sa-update-user-form #update-user-form-alert").show().addClass('alert-success').html(DecodedResults.msg)

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
                $("#sa-update-user-form #update-user-form-alert").removeClass('alert-success')
                $("#sa-update-user-form #update-user-form-alert").removeClass('alert-danger')
                $("#sa-update-user-form #update-user-form-alert").show().addClass('alert-warning').html('Check in the forms for errors')

                if('firstname' in errorsCount){
                    $("#sa-update-user-form #firstname-err").html(errorsCount.firstname[0])
                }else{
                    $("#sa-update-user-form #firstname-err").html('')
                }

                if('lastname' in errorsCount){
                    $("#sa-update-user-form #lastname-err").html(errorsCount.lastname[0])
                }else{
                    $("#sa-update-user-form #lastname-err").html('')
                }

                if('dob' in errorsCount){
                    $("#sa-update-user-form #dob-err").html(errorsCount.dob[0])
                }else{
                    $("#sa-update-user-form #dob-err").html('')
                }

                if('placeofbirth' in errorsCount){
                    $("#sa-update-user-form #placeofbirth-err").html('The Place of Birth field is required.')
                }else{
                    $("#sa-update-user-form #placeofbirth-err").html('')
                }

                if('gender' in errorsCount){
                    $("#sa-update-user-form #gender-err").html(errorsCount.gender[0])
                }else{
                    $("#sa-update-user-form #gender-err").html('')
                }

                if('address' in errorsCount){
                    $("#sa-update-user-form #main-address-err").html(errorsCount.address[0])
                }else{
                    $("#sa-update-user-form #main-address-err").html('')
                }

                if('email' in errorsCount){
                    $("#sa-update-user-form #email-address-err").html(errorsCount.email[0])
                }else{
                    $("#sa-update-user-form #email-address-err").html('')
                }

                if('username' in errorsCount){
                    $("#sa-update-user-form #username-err").html(errorsCount.username[0])
                }else{
                    $("#sa-update-user-form #username-err").html('')
                }

                if('role' in errorsCount){
                    $("#sa-update-user-form #role-type-err").html(errorsCount.role[0])
                }else{
                    $("#sa-update-user-form #role-type-err").html('')
                }

                if('contact' in errorsCount){
                    $("#sa-update-user-form #main-contact-err").html(errorsCount.contact[0])
                }else{
                    $("#sa-update-user-form #main-contact-err").html('')
                }

                // console.log(s)
                // console.log('errorMessage : ' + d)
                console.log(errorsCount)
                // console.log(f)
                // console.log('firstname' in errorsCount)
            }
        })
    })

    // show delete user modal form
    $("#sa-delete-user-form #delete-user-form-alert").hide()
    $(document).on("show.bs.modal", "#delete-user-modal-form", (event)=>{
        let str = $(event.relatedTarget)
        let modal = $("#delete-user-modal-form")
        let user_id = str.data('user_id')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-user')}}',
            method:'GET',
            cache:false,
            data: {'user_id' : user_id},
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                // console.log(DecodedResults)
                if(DecodedResults.status === 201){
                    $("#sa-delete-user-form #delete-user-form-alert").show().addClass("alert-warning").html(DecodedResults.msg)
                    $("#sa-delete-user-form #delete-user-form-alert").removeClass("alert-danger").html('')
                }else{
                    $("#sa-delete-user-form #delete-user-form-alert").removeClass("alert-warning").html('')
                    $("#sa-delete-user-form #delete-user-form-alert").removeClass("alert-danger").html('')
                    modal.find("#delete-notice").html('Are you sure of deleting '+DecodedResults.data[0].sur_name+' '+DecodedResults.data[0].last_name+' data ?')
                    modal.find("input[name=user-id]").val(DecodedResults.data[0].userid)
                }
            }
        })
    })

    // delete user info from delete modal form
    $(document).on("submit", "#sa-delete-user-form", (e)=>{
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.delete-user')}}',
            method:'POST',
            cache:false,
            dataType: 'json',
            data: $("#sa-delete-user-form").serialize(),
            beforeSend:()=>{
                Swal.fire({
                    title: 'Notification',
                    html: "Sit tight as we check all the records",
                    icon: 'info',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false
                })
            },
            success:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                if(DecodedResults.status === 201){
                    $("#sa-delete-user-form #delete-user-form-alert").removeClass('alert-success')
                    $("#sa-delete-user-form #delete-user-form-alert").removeClass('alert-warning')
                    $("#sa-delete-user-form #delete-user-form-alert").show().addClass('alert-danger').html(DecodedResults.msg)
                }else{
                    $("#sa-delete-user-form #delete-user-form-alert").removeClass('alert-danger')
                    $("#sa-delete-user-form #delete-user-form-alert").removeClass('alert-warning')

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
            }
        })
    })

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
