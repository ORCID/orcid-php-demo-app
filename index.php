<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ORCID Create on Demand Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="boostrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="boostrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="http://orcid.org/sites/default/files/images/orcid_16x16.png" />
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="https://orcid-create-on-demand.herokuapp.com/">Home</a></li>
          <li><a href="http://orcid.org" target="_blank">About ORCID</a></li>
          <li><a href="https://orcid.org/help/contact-us" target="_blank">Contact ORCID</a></li>
        </ul>
        <h3 class="muted">ORCID @ State University</h3>
      </div>

      <hr>

      <div class="jumbotron">
        <h1>Get an ORCID iD!</h1>
        <br>
        <p class="lead">Click the button below to create an ORCID iD and connect it to State University's faculty profile system.</p>
        <a class="btn btn-large" href="https://sandbox.orcid.org/oauth/authorize?client_id=APP-V05T7FZU8MBVCXGN&response_type=code&scope=/authenticate&redirect_uri=https://orcid-create-on-demand.herokuapp.com/oauth-redirect.php"><img id="orcid-id-logo" src="http://orcid.org/sites/default/files/images/orcid_24x24.png" width='24' height='24' alt="ORCID logo"/> Create a new ORCID iD</a>
        <br> <br>
        <p class="lead">Already have an ORCID iD? <a href="https://sandbox.orcid.org/oauth/authorize?client_id=APP-V05T7FZU8MBVCXGN&response_type=code&scope=/authenticate&redirect_uri=https://orcid-create-on-demand.herokuapp.com/oauth-redirect.php&show_login=true">Connect your existing ORCID iD</a>
      </div>

      <hr>

     <!-- <div class="row-fluid marketing">
        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>

      <hr>-->

      <div class="footer">
        Want to build your own create-on-demand app? <a href="https://github.com/lizkrznarich/orcid-demo-app" target="_blank">Get the code</a>
      </div>

    </div> <!-- /container -->

    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="boostrap/js/jquery.js"></script>
    <script src="boostrap/js/bootstrap-transition.js"></script>
    <script src="boostrap/js/bootstrap-alert.js"></script>
    <script src="boostrap/js/bootstrap-modal.js"></script>
    <script src="boostrap/js/bootstrap-dropdown.js"></script>
    <script src="boostrap/js/bootstrap-scrollspy.js"></script>
    <script src="boostrap/js/bootstrap-tab.js"></script>
    <script src="boostrap/js/bootstrap-tooltip.js"></script>
    <script src="boostrap/js/bootstrap-popover.js"></script>
    <script src="boostrap/js/bootstrap-button.js"></script>
    <script src="boostrap/js/bootstrap-collapse.js"></script>
    <script src="boostrap/js/bootstrap-carousel.js"></script>
    <script src="boostrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
