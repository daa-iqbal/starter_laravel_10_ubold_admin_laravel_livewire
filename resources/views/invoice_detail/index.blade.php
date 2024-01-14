@extends('layouts.app')
@section('title')
  <title>List Invoice Detail Invoice</title>
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
                        <li class="breadcrumb-item  breadcrumb-link"><a class="breadcrumb-link text-hover-color-scheme"  href="{{route('invoice.index')}}">List Invoice</a></li>
                        <li class="breadcrumb-item  breadcrumb-link active">Detail Invoice</li>
                      </ol>
                </div>
                <h4 class="page-title">Detail Invoice</h4>
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

                      <div class="col align-self-end">

                      </div>

                    </div>
                    <div class="row">
                      <div class="btn-toolbar" style="padding-bottom:8px">
                        <div class="btn-group dropdown-btn-group pull-left" style="padding-bottom:20px;">
                          <b ><h4 class="header-title" style="font-size: 1.25rem;"> </h4></b>
                        </div>
                        <div class="btn-group dropdown-btn-group pull-right" style="padding-bottom:20px;">


                        </div>
                      </div>
                      <div class="col-lg-5">

                        <div class="row mb-2">
                          <label  class="col-5 col-xl-5 col-form-label"><b>Kode Invoice </b> </label>
                          <label  class="col-5 col-xl-6 col-form-label">
                            {{ $data->no_invoice }}
                          </label>
                        </div>
                        <div class="row mb-2">
                          <label  class="col-5 col-xl-5 col-form-label"><b> ID Pasien </b> </label>
                          <label  class="col-5 col-xl-6 col-form-label">
                            {{ $data->pasien->kode }}
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="row mb-2">
                          <label  class="col-5 col-xl-5 col-form-label"><b> Tanggal </b> </label>
                         <label  class="col-5 col-xl-6 col-form-label">
                            {{ $data->created_at }}
                          </label>
                        </div>
                         <div class="row mb-2">
                          <label  class="col-5 col-xl-5 col-form-label"><b> Nama Pasien </b> </label>
                          <label  class="col-5 col-xl-6 col-form-label">
                            {{ $data->pasien->name }}
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <table id="datatable"
                               class="table w-100 nowrap"
                               role="grid" aria-describedby="datatable-buttons_info" style="width: 924px;">
                          <thead style="color: white; background: #DF2333;">
                          <tr>
                            <th valign="middle" >No </th>
                            <th valign="middle" >Item Yang Dibeli</th>
                            <th valign="middle" >Harga (Rp)</th>

                            <th valign="middle" >Jumlah</th>

                            <th valign="middle" style="" >Sub Total (Rp)</th>

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
                      <div class="col-sm-12">
                        <label  class="col-9 col-xl-9 col-form-label"><b>Total (Rp)</b> </label>
                          <label  class="col-2 col-xl-2 col-form-label">
                            {{ $data->total}}
                          </label>


                      </div>
                    </div>

                  </div>

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

        /*Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: "{{Session::has('notification')}}",

        });*/

        $("#title-paragraph-alert-modal-success").html("Success!");
        $("#content-paragraph-alert-modal-success").html("{{Session::has('notification')}}");
        $("#continue-alert-modal-success").html("Continue");
        $("#info-alert-modal-success").modal('show');

      @endif



      @if(Session::has('failMessage'))

      Swal.fire({
        icon: 'error',
        title: 'Failed!',
        text: "{{Session::has('failMessage')}}",

      })
      @endif

      @if(Session::has('successMessage'))

        /*Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: "{{Session::has('successMessage')}}",

        })*/
        $("#title-paragraph-alert-modal-success").html("Success!");
        $("#content-paragraph-alert-modal-success").html("{{Session::has('successMessage')}}");
        $("#continue-alert-modal-success").html("Continue");
        $("#info-alert-modal-success").modal('show');
      @endif







      let url = "{{ route('invoice-detail.datatable',['id'=> $data->id]) }}";
      let table = $("#datatable").DataTable({
         columnDefs: [
   				 			{ "orderable": false, "targets": [] },
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
              columns: [0, 1, 2, 3, 5]
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: [0, 1, 2, 3, 5]
            }
          },
          {
            extend: 'pdf',
            exportOptions: {
              columns: [0, 1, 2, 3, 5]
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: [0, 1, 2, 3, 5]
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

                    data: 'barang.nama',


                },

                {
                    data: 'barang.harga',


                },
                {
                    data: 'jumlah_barang',


                },
                {
                    data: 'sub_total',


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


    $('.btndelete').on('click', function () {
      let dataid = $(this).attr("dataid");
      let fullname = $(this).attr("fullname");
      let urldelete = "";

      urldelete = urldelete.replace('data.id', dataid);
      $('#top-modal-delete').modal('show');
      dataId =  dataid;
      urlDelete = urldelete;
      let labelDelete = 'Delete Content';
      let contentParagraphDelete = "Do you really want to delete content </br>" + "<b>"+"'"+fullname+"'"+"</b>"+"?";
      let yesDelete = "Delete Content";
      let noDelete  = "Never Mind, Keep the Content";
      $('#topModalLabelDelete').html(labelDelete);
      $('#content-paragraph-delete').html(contentParagraphDelete);
      $('#yes-delete').html(yesDelete);
      $('#no-delete').html(noDelete);
      //console.log(urldelete);
      // Swal.fire({
      //   title: 'Are you sure want to delete ' + fullname + ' ?',
      //   text: "You won't be able to revert this!",
      //   icon: 'warning',
      //   showCancelButton: true,
      //   confirmButtonColor: '#3085d6',
      //   cancelButtonColor: '#d33',
      //   confirmButtonText: 'Yes, delete it!'
      // }).then((result) => {
      //   if (result.isConfirmed) {
      //     window.location.href = urldelete;
      //   }
      // })

    })

   $('#yes-delete').on('click', function() {
      window.location.href = urlDelete;
   });
  </script>
  <!-- third party js ends -->
@endsection
