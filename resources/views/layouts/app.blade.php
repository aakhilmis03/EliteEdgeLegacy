<!doctype html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {!! get_meta_data() !!}
  <link rel="icon" type="image/x-icon" href="{{url('front_assets')}}/img/favicon.png">
  @include('layouts.css')
  @yield('extra_css')

  <!-- Google Tag Manager -->
  <script>
  (function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PKFGV6CQ');
    </script>
  <!-- End Google Tag Manager -->

  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SMRX0W71X7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-SMRX0W71X7');
</script>

</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PKFGV6CQ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="main-wrapper">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->


  <!--footer fixed popup-->

  <!-- start Auto Popup Modal -->
  <div class="modal fade" id="autoPopUp" tabindex="-1" aria-labelledby="exampleModalPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content auto_popup ">
        <div class="modal-body">
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
          <div class="top-footer">
            <div class="container">
              <div class="autopopup">
                <div class="autopopupleft d-none d-sm-block">
                  <div class="autopopupimg">
                    <img src="{{url('front_assets/img/banner/popup-banner.jpg')}}" class="img-fluid">
                  </div>
                </div>
                <div class="form-footer auto_popup_content">
                  <h5><span>Leave Your Details Here</span></h5>
                  <h4>Assured Call Back Within 5 Minutes</h4>
                  <form method="post" class="myForm" action="{{url('saveEnquiryData')}}">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                      <input type="number" name="phone" class="form-control" placeholder="Enter phone no."
                        data-parsley-required-message="Please enter valid phone no." minlength="10" maxlength="10"
                        required>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn send_btn ">Send Message</button>
                    </div>
                  </form>
                  <h4 class="m-2">OR</h4>
                  <h4 class="m-0"><a href="tel:+919999977783">Call: +91 9999977783</a></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end Auto Popup Modal -->
  @include('layouts.js')
  @yield('extra_js')

  <script>
    $(document).ready(function () {
      function show_popup() {
        //var show_popup = localStorage.getItem("show_popup");
        //if(show_popup!='true')
        //{
        $('#autoPopUp').modal('show');
        //localStorage.setItem("show_popup", "true");
        //}
      };
      window.setTimeout(show_popup, 30000); // 30000 5 seconds
    });
  </script>

</body>

</html>