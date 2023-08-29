<script type="text/javascript">
    // constant to get all roles
    const AllUsersRoles = () =>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-all-roles')}}',
            method:'GET',
            cache:false,
            success:(Response)=>{
                $("#edit-user-modal-form").find("select[name=role]").append(Response)
            }
        })
    }
    AllUsersRoles();

    //constant to get all categories
    const AllCategoriesInDropdown = () =>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.categories-dropdown')}}',
            method:'GET',
            cache:false,
            success:(Response)=>{
                $("#add-sub-category-modal").find("select[name=cat-id]").append(Response)
                $("#edit-sub-category-modal").find("select[name=cat-id]").append(Response)
                $("#sa-new-menu-form").find("select[name=cat-id]").append(Response)
            }
        })
    }
    AllCategoriesInDropdown()

    function SubCategoriesBasedOnCategory(category_id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.sub-categories-dropdown-based-on-category')}}',
            method:'GET',
            cache:false,
            data:{'cat-id': category_id},
            success:(Response)=>{
                console.log(Response)
            }
        })
    }

</script>
