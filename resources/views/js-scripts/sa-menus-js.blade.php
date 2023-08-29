<script type="text/javascript">

    {{--  Alerts  --}}
    $(".new-menu-form-alert").hide()

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


</script>
