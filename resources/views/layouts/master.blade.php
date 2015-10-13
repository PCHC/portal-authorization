<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-22274651-7', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
  <body>
      <div class="container">
          <div class="content">
            <h1>@yield('title')</h1>
            @if($errors->has())
            <div class="row">
              <div class="col-xs-12">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>{{ $error }}</strong>
                </div>
                @endforeach
              </div>
            </div>
            @endif
            <div class="row">
              <div class="col-sm-8">
                @yield('content')
              </div>
              <div class="col-sm-4">
                <div class="list-group">
                  <a href="https://portal.pchc.com/pchc/" class="list-group-item active" target="_blank"><strong>PCHC Patient Portal <span class="glyphicon glyphicon-new-window"></span></strong></a>
                  <div class="list-group-item">
                    <h4>Contact Information</h4>
                    <p>Phone: 207-945-5247<br>
                    <a href="http://pchc.com" target="_blank">pchc.com</a></p>

                    <h4>Mailing Address</h4>
                    <p>PO Box 439<br>
                    Bangor, ME 04402</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
