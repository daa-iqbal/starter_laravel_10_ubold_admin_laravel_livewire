@extends('layouts.app')
@section('title')
  <title>List Pasien</title>
@endsection
@section('style')
  <!-- third party css -->
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link
    href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css"/>
  <link
    href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css"/>
  <link
    href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css"/>
  <link
    href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css"/>
    <style>
      btn-add:hover {

        background-color: #DF2333 !important;
        color: white !important;
      }
      .dataTables_length_custom{
  padding-bottom: 0px!important;
}
.dataTables_filter_custom{
  padding-bottom: 0px !important;
}
.search-datatable {
    border-radius: 30px!important;
    padding-bottom: -5px!important;
      /* background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
      background-repeat: no-repeat;
      background-color: #fff;
      background-position: 0px 3px !important; */

}

.tr-odd{
  border-color: transparent!important;
  background-color: #F7F9FC!important;
}
.tr-even{
  border-color: transparent!important;
  background-color: #FFFFFF!important;
}
.pd-top-pagination{
  padding-top: 16px!important;;
}
.add-button{
   background-color: #FFFFFF!important;
   border-color: #6D757D!important;
}
.add-button:hover {
  border-color: #DF2333!important;
  background-color: #DF2333!important;
  color: white!important;
}
.page-item.active .page-link {
    /* z-index: 3; */
    position: relative;
    display: block;
    color: #fff;
    background-color: #DF2333;
    border-color: #DF2333;
}


  .bottom-wrapper {
      margin-top: 0.5em;
  }
  .top-wrapper {
    margin-bottom: 0.5em;
  }
  /* .card-drop:hover{
    color: #DF2333!important;
  } */
  </style>
  <!-- third party css end -->
@endsection
@section('navbar')
  @include('layouts.navbar.navbar_custom')
@endsection


@section('content')
  <div class="content-page">
    <div class="content">


        <!-- Start Content-->
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item  breadcrumb-link active"><a class="breadcrumb-link text-hover-color-scheme"  href="{{route('pasien.index')}}">List Pasien</a></li>
                    </ol>
                </div>
                <h4 class="page-title">List Pasien</h4>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">


                  <div class="btn-toolbar">

                    <div class="btn-group dropdown-btn-group pull-right">


                    </div>
                  </div>

                  <div class="responsive-table-plugin dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                      <div class="col align-self-start">

                      </div>
                      <!-- <div class="col align-self-center">
                          <div class="dt-buttons btn-group flex-wrap">
                              <button class="btn btn-secondary buttons-copy buttons-html5 btn-light" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button>
                              <button class="btn btn-secondary buttons-print btn-light" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Print</span></button>
                              <button class="btn btn-secondary buttons-pdf buttons-html5 btn-light" tabindex="0" aria-controls="datatable-buttons" type="button"><span>PDF</span></button>
                           </div>
                      </div>  -->
                      <div class="col align-self-end">

                      </div>

                    </div>
                    <div class="row">
                      <div class="btn-toolbar" style="padding-bottom:8px">
                        <div class="btn-group dropdown-btn-group pull-left" style="padding-bottom:20px;">
                          <b ><h4 class="header-title" style="font-size: 1.25rem;"> </h4></b>
                        </div>
                        <div class="btn-group dropdown-btn-group pull-right" style="padding-bottom:20px;">
                            <a href="{{ route('pasien.create')}}" class="btn  button-hover-color-scheme"> <i class="fas fa-plus-square"></i>&#160;  Add New Data</a>

                        </div>
                      </div>
                      <div class="col-sm-12">
                        <table id="datatable"
                               class="table w-100 nowrap"
                               role="grid" aria-describedby="datatable-buttons_info" style="width: 924px;">
                          <thead style="color: white; background: #DF2333;">
                          <tr>
                            <th valign="middle" >No </th>
                            <th valign="middle" >Kode</th>
                            <th valign="middle" >Nama </th>
                            <th valign="middle" >Email </th>

                            <th valign="middle" >No Telepon</th>


                            <th valign="middle" ></th>
                          </tr>
                          </thead>
                          <script>
                            let arrAssignments = [];
                            let i = 0;
                            let j = 0;
                          </script>

                          <tbody>


                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                  <form id="form_delete_data" action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  </form>
                </div> <!-- end card body-->
              </div> <!-- end card -->
            </div><!-- end col-->
          </div>
          <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

     <!-- Footer Start -->

     <!-- end Footer -->

  @include('layouts.modal_and_alert')

  </div>
@endsection

@section('script')
  <!-- third party js -->
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
  <!-- Sweet Alerts js -->
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

  <script>
    let dataId =  0;
    let urlDelete = '';
    $(document).ready(function () {
      $(".mlw-li").hide()
      $(".mlw-li-home").show()
      @if(Session::has('notification'))

        $("#title-paragraph-alert-modal-success").html("Success!");
        $("#content-paragraph-alert-modal-success").html("{{Session::has('notification')}}");
        $("#continue-alert-modal-success").html("Continue");
        $("#info-alert-modal-success").modal('show');

      @endif

      @if(Session::has('success'))
        $("#title-paragraph-alert-modal-success").html("Success!");
        $("#content-paragraph-alert-modal-success").html("{{Session::has('successMessage')}}");
        $("#continue-alert-modal-success").html("Continue");
        $("#info-alert-modal-success").modal('show');

      @endif
      @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Failed!',
            text: 'Terjadi Kesalahan!',

        });
      @endif

      let url = "{{ route('pasien.datatable') }}";
      let table = $("#datatable").DataTable({
         columnDefs: [

                { "type": "num", "width" : "18px", "targets" : 0},
                { "width" : "350px", "targets" : 1},

                { "width" : "100px", "targets" : 3},


  							],
        language: {
          search : ' ', /*Empty to remove the label*/
        },
        order: [

        ],
        aLengthMenu : [[25, 50, 75, -1], [25, 50, 75, "All"]],
        iDisplayLength: 25,

        scrollX: !0,
        //dom: 'Bfrltip',
        buttons: [
          {
            extend: 'copy',
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: 'pdf',
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            }
          },
          //'colvis'
        ],
        processing: true,
        serverSide: true,
        ordering: true,

        ajax: url,
        columns: [
                {

                    title: 'id',
                    data: null,
                    render: (data, type, row, meta) => parseInt(table.page.info().page)*parseInt(table.page.info().length) + meta.row+1

                },
                {

                    data: 'kode',


                },

                {
                    data: 'name',


                },
                {
                    data: 'email',


                },
                {
                    data: 'phone',


                },

                {
                    data: null,
                    searchable: false,
                    render: function(data){
                        let linkEdit = "{{route('pasien.edit', ':id')}}";
                        linkEdit = linkEdit.replace(':id', data.id);
                        let linkDelete = "{{route('pasien.delete', ':id')}}";
                        linkDelete= linkDelete.replace(':id', data.id);
                        let aksi = '<div class="dropdown float-end">'+
                                        '<a href="#" class="dropdown-toggle arrow-none card-drop text-hover-color-scheme" data-bs-toggle="dropdown" aria-expanded="false">'+
                                            '<i class="mdi mdi-dots-horizontal"></i>'+
                                        '</a>'+
                                        '<div class="dropdown-menu dropdown-menu-end">'+

                                            '<a  href="'+linkEdit+'" class="tabledit-edit-button dropdown-item btnedit-'+data.id+'"  dataid="'+data.id+'" style="float: none;"><!--<span class="mdi mdi-pencil"></span>--> Edit</a>'+

                                            '<div class="dropdown-divider"></div>'+
                                            '<a  href="javascript:void(0);" class="dropdown-item btndelete" fullname="'+data.name+'" dataid="'+data.id+'" style="float: none;"><!--<span class="mdi mdi-delete"></span>--> Delete</a>'+

                                        '</div>'+
                                    '</div>';
                        return aksi;
                    }

                },



            ],
        pagingType:
          "full_numbers",
        drawCallback: function () {

          $(".dataTables_paginate > .pagination").addClass("pagination-default")
          $(".dataTables_info").addClass("pd-top-pagination")
          $(".dataTables_paginate").addClass("pd-top-pagination")
          $(".odd").addClass("tr-odd")
          $(".even").addClass("tr-even")
          $('input[type="search"]').addClass("search-datatable")
          $('input[type="search"]').attr("placeholder", "    Search here");
          $('.dataTables_length').addClass('dataTables_length_custom');
          $('.dataTables_filter').addClass('dataTables_filter_custom');

            }
        });
        $(".dataTables_length select").addClass("form-select form-select-sm"),
        $(".dataTables_length select").removeClass("custom-select custom-select-sm"),
        $(".dataTables_length label").addClass("form-label")
        $(".dataTables_filter label").addClass("form-label")


    });


    $(document).delegate('.btndelete','click', function () {
      let dataid = $(this).attr("dataid");

      console.log(dataid);
      let fullname = $(this).attr("fullname");
      let urldelete = "";

      urldelete = urldelete.replace('data.id', dataid);
      $('#top-modal-delete').modal('show');
      dataId =  dataid;
      let linkDelete = "{{route('pasien.delete', ':id')}}";
      linkDelete= linkDelete.replace(':id', dataId);
      $("#form_delete_data").attr("action",linkDelete);
      let labelDelete = 'Hapus Pasien';
      let contentParagraphDelete = "Apakah anda yakin akan menghapus data pasien ini </br>" + "<b>"+"'"+fullname+"'"+"</b>"+"?";
      let yesDelete = "Hapus Pasien";
      let noDelete  = "Batal Hapus";
      $('#topModalLabelDelete').html(labelDelete);
      $('#content-paragraph-delete').html(contentParagraphDelete);
      $('#yes-delete').html(yesDelete);
      $('#no-delete').html(noDelete);


    });

   $('#yes-delete').on('click', function() {
      $('#form_delete_data').submit();
   });
  </script>
  <!-- third party js ends -->
@endsection
