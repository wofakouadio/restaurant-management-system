<script type="text/javascript">
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
    })
</script>
