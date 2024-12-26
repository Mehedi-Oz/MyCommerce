<script src="{{asset('admin-asset')}}/assets/node_modules/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin-asset')}}/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('admin-asset')}}/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="{{asset('admin-asset')}}/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{asset('admin-asset')}}/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin-asset')}}/dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset('admin-asset')}}/assets/node_modules/raphael/raphael-min.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/morrisjs/morris.min.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- This is data table -->
<script src="{{asset('admin-asset')}}/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>

{{--<!-- Popup message jquery -->
<script src="{{asset('admin-asset')}}/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="{{asset('admin-asset')}}/dist/js/dashboard1.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/toast-master/js/jquery.toast.js"></script>--}}


<!-- jQuery file upload -->
<script src="{{asset('admin-asset')}}/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

<script>
    $(function () {
        $('#myTable').DataTable();
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
        // responsive table
        $('#config-table').DataTable({
            responsive: true
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
    });
</script>

//SummerNote
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200
        });
    });

</script>

//Get_SubCategory_By_CategoryID
<script>
    $(function () {
        $(document).on('change', '#categoryId', function () {
            var categoryId = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{route('product.get-subcategory-by-category')}}',
                data: {id: categoryId},
                dataType: 'JSON',
                success: function (response) {
                    var subCategory = $('#subCategoryId'); // Correct variable usage
                    subCategory.empty(); // Correctly use subCategory instead of subCategoryId
                    var option = '';
                    option += '<option value="" disabled selected> --Select Sub Category--</option>';
                    $.each(response, function (key, value) {
                        option += '<option value="' + value.id + '"> ' + value.name + ' </option>'; // Fixed invalid attributes
                    });
                    subCategory.append(option); // Correctly use subCategory instead of subCategoryId
                }
            });
        });
    });
</script>
