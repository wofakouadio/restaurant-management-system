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
                $("#edit-menu-modal").find("select[name=cat-id]").append(Response)
            }
        })
    }
    AllCategoriesInDropdown()

    // constant to get all Sub-Categories
    const AllSubCategories = () =>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-sub-categories')}}',
            method:'GET',
            cache:false,
            success:(Response)=>{
                $("#edit-menu-modal").find("select[name=sub-cat-id]").append(Response)
            }
        })
    }
    AllSubCategories()

    // constant to get total pending/placed orders
    const PendingOrders = () =>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.pending-orders-counter')}}',
            method:'GET',
            cache:false,
            success:(Response)=>{
                $("#hero-dash-order-count").html(Response + ' pending orders')
            }
        })
    }
    PendingOrders();

    // const to load cart items
    const LoadCartItems = () =>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('sa.get-cart-items-index')}}',
            method:'GET',
            cache:false,
            success:(Response)=>{
                $("#cart-items").html(Response)
            }
        })
    }
    LoadCartItems()
    {{--function SubCategoriesBasedOnCategory(category_id){--}}
    {{--    $.ajaxSetup({--}}
    {{--        headers: {--}}
    {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--        }--}}
    {{--    });--}}
    {{--    $.ajax({--}}
    {{--        url:'{{route('sa.sub-categories-dropdown-based-on-category')}}',--}}
    {{--        method:'GET',--}}
    {{--        cache:false,--}}
    {{--        data:{'cat-id': category_id},--}}
    {{--        success:(Response)=>{--}}
    {{--            console.log(Response)--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

</script>
