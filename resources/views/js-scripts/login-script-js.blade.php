<script type="text/javascript">
    {{--  Alerts  --}}
    $("#login-form #login-form-alert").hide()
    {{--  Login  --}}
    $(document).on("submit", "#login-form", (e)=>{
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('auth.user-login')}}',
            method:'POST',
            cache:false,
            data: $("#login-form").serialize(),
            success: (Response)=>{
                let response = JSON.stringify(Response)
                let result = JSON.parse(response)
                if(result.status === 201){
                    $("#login-form #login-form-alert").removeClass('alert-success')
                    $("#login-form #login-form-alert").removeClass('alert-danger')
                    $("#login-form #login-form-alert").show().addClass('alert-warning').html(result.msg +' '+ result.data)
                }else{
                    $("#login-form #login-form-alert").removeClass('alert-warning')
                    $("#login-form #login-form-alert").removeClass('alert-danger')
                    $("#login-form #login-form-alert").show().addClass('alert-success').html(result.msg)
                    window.location.href = result.data
                }
            },
            error:(response)=>{
                let StringResults = JSON.stringify(response)
                let DecodedResults = JSON.parse(StringResults)
                let errorsCount = DecodedResults.responseJSON.errors
                $("#login-form #login-form-alert").removeClass('alert-success')
                $("#login-form #login-form-alert").removeClass('alert-danger')
                $("#login-form #login-form-alert").show().addClass('alert-warning').html(DecodedResults.responseJSON.message)

                if('password' in errorsCount){
                    $("#login-form #password-err").html(errorsCount.password[0])
                }else{
                    $("#login-form #password-err").html('')
                }
                if('username' in errorsCount){
                    $("#login-form #username-err").html(errorsCount.username[0])
                }else{
                    $("#login-form #username-err").html('')
                }

                console.log(errorsCount)
            }
        })
    })
</script>
