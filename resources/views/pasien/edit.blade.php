@extends('layouts.app')
@section('title')
  <title>Add Pasien</title>
@endsection
@section('style')
  <!-- third party css -->
  <!-- Plugins css -->
  <!-- Plugins css -->
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/flatpickr/flatpickr.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link
    href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
    rel="stylesheet" type="text/css"/>
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/dropzone/min/dropzone.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/dropify/css/dropify.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/mohithg-switchery/switchery.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/multiselect/css/multi-select.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/select2/css/select2.min.css') }}"
        rel="stylesheet" type="text/css"/>

  <link
    href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
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
  <link href="{{ asset('JS/summernote/summernote.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('JS/dropify/dist/css/dropify.css') }}" rel="stylesheet" type="text/css" />
  <!-- third party css end -->
@endsection
@section('navbar')
    @include('layouts.navbar.navbar_custom')
@endsection
@section('content')
  <div class="content-page">


    <!-- Start Content-->
    <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box">
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item  breadcrumb-link"><a class="breadcrumb-link text-hover-color-scheme"  href="{{route('pasien.index')}}">List Pasien</a></li>

                  <li class="breadcrumb-item  breadcrumb-link active">Edit Pasien</li>
                </ol>
              </div>
              <div class="row">
                <div class="col-lg-2">
                    <a href="{{route('pasien.index')}}" ><h4 class="page-title back-button  text-hover-color-scheme"><i class="mdi mdi-arrow-left"></i> Back</h4> </a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">

                <h4 class="header-title" style="padding-bottom:20px;">Edit Pasien</h4>

                <div class="row">
                  <div class="col-lg-7" style="padding-top:15px;">
                @if ($errors->any())

                    @foreach ($errors->all() as $error)

                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                            role="alert">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ $error }}
                        </div>
                    @endforeach

                @endif
                <form id="edit_pasien" action="{{ route('pasien.update',['id' => $data->id]) }}"
                      enctype="multipart/form-data" method="POST">
                      {{ csrf_field() }}

                  <div class="row mb-3">
                    <label for="name" class="col-5 col-xl-4 col-form-label"  style="color:#6D757D">Nama
                       </label>
                    <div class="col-8 col-xl-8">
                      <input type="text" id="name" name="name" class="form-control" value="{{$data->name}}" style="color:#333333;" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="email" class="col-5 col-xl-4 col-form-label"  style="color:#6D757D">Email
                       </label>
                    <div class="col-8 col-xl-8">
                      <input type="email" id="email" name="email" class="form-control" value="{{$data->email}}" style="color:#333333;" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="phone" class="col-5 col-xl-4 col-form-label"  style="color:#6D757D">Phone
                       </label>
                    <div class="col-8 col-xl-8">
                      <input type="text" id="phone" name="phone" class="form-control" value="{{$data->phone}}" style="color:#333333;" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-5 col-xl-4 form-label"></label>
                    <div class="col-8 col-xl-8">
                      <button type="submit" id="edit_pasien_btn" class="btn btn-danger waves-effect waves-light col-12 col-xl-8" ><i class="fas fa-plus-square"></i>&#160; Edit Pasien
                      </button>
                      <a href="{{route('pasien.index')}}" class="btn btn-light waves-effect col-3 col-xl-3"
                          style="background-color:#F0F2F7; color:#6D757D; float: right;">Cancel
                       </a>
                    </div>
                  </div>
                </form>
              </div>
              </div>
                <!-- end row-->

              </div> <!-- end card-body -->
            </div> <!-- end card -->
          </div><!-- end col -->
        </div>
        <!-- end row -->


        <!-- RADIOS -->


      </div> <!-- container -->

    </div> <!-- content -->


    <!-- Footer Start -->
    @include('layouts.modal_and_alert')
    <!-- end Footer -->

  </div>
@endsection

@section('script')
  <!-- third party js -->
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/select2/js/select2.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
  <script
    src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
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
  <!-- Plugins js -->
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/dropzone/min/dropzone.min.js') }}"></script>
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/dropify/js/dropify.min.js') }}"></script>
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('JS/summernote/summernote.js') }}"></script>
  <script src="{{ asset('JS/dropify/src/js/dropify.js') }}"></script>

  <script>
    $(document).ready(function () {
      $(".mlw-li").hide()
      $(".mlw-li-home").show()
      //$('#note').summernote();
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


      // let selectorVisible  = $('#visible').selectize({

      // });

    });


  </script>
  <!-- third party js ends -->
@endsection
