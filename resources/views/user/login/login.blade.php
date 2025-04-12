@extends($theme . '.shop_layout')
@section('slide')
@endsection


@push('style')
@endpush

@section('content')
    <main id="main" class="">


        <div class="page-wrapper page-left-sidebar">
            <div class="row" style="justify-content: center">

                <div id="content" class="large-9 right col" role="main">
                    <div class="page-inner">

                      
                           
                            <div class="col medium-12 small-12 large-12">
                                <div class="col-inner">
                                    <div role="form" class="wpcf7" id="wpcf7-f13-p253-o1" lang="vi" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                        <h3 style="font: bold 20px orange; text-align:center; padding:30px 0 10px 0">Đăng nhập</h3>
                                        <form action="{{ url('dang-nhap.html') }}" method="post">
                                            {{ csrf_field() }}
                                            
                                            <p><label> Email (*)<br>
                                                    <span class="wpcf7-form-control-wrap your-name"><input required
                                                            type="email" name="email" value="" size="40"
                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                            aria-required="true" aria-invalid="false"></span> </label></p>
                                            <p><label> Mật khẩu (*)<br>
                                                    <span class="wpcf7-form-control-wrap your-email"><input required
                                                            type="password" name="password" value="" size="40"
                                                            class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                            aria-required="true" aria-invalid="false"></span> </label></p>
                                            
                                            <p ><input type="submit" value="Đăng nhập"
                                                    class="wpcf7-form-control wpcf7-submit"></p>
                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                        </form>
                                    </div>
                                </div>

                            <style scope="scope">
                                #row-86050051>.col>.col-inner {
                                    padding: 20px 0px 0px 0px;
                                }
                            </style>
                        </div>


                    </div>
                    <!-- .page-inner -->
                </div>
               

            </div>
            <!-- end row -->
        </div>
        <!-- end page-right-sidebar container -->

    </main>
    <script>
        document.body.classList.remove('home');
    </script>
@endsection

@section('breadcrumb')
@endsection

@push('scripts')
    <script>
        $("#contact-nav_item").toggleClass("active");
    </script>
@endpush
