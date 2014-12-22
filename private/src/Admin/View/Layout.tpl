<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/favicon.ico">

    <title>Admin - site eCommerce</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/helium.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Helium</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
            <li class="active"><a href="{url alias='home'}">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          {if isset($app.cookies.id) && $app.cookies.id > 0}
            <form class="navbar-form navbar-right" role="form" method="post" style="color:white;">
                    Welcome {$app.cookies.user}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/?deconnection=1" style="color:white;text-decoration:underline">Deconnection</a>
            </form>
          {else}
              <form class="navbar-form navbar-right" role="form" method="post" action="/">
                <div class="form-group">
                  <input type="text" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
              </form>
          {/if}
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<div id="tabs">
  <ul>
    <li><a href="#fragment-1"><span>Catalog</span></a></li>
    <li><a href="#fragment-2"><span>User</span></a></li>
    <li><a href="#fragment-3"><span>Orders</span></a></li>
    <li><a href="#fragment-4"><span>Setup</span></a></li>
    <li><a href="#fragment-5"><span>Content</span></a></li>
  </ul>
  <div id="fragment-1">
    <div style="float:left;width:100%">
        <a href="{url alias='brands'}">Brand</a>
        &nbsp;
        <a href="{url alias='products'}">Products</a>
        &nbsp;
        <a href="{url alias='offers'}">Offers</a>
        &nbsp;
        <a href="{url alias='vat'}">Vat</a>
        &nbsp;
        <a href="{url alias='categories'}">Categories</a>
        &nbsp;
        <a href="{url alias='attribute'}">Attributes</a>
        &nbsp;
        <a href="{url alias='merchants'}">Merchants</a>
    </div>
    <br/>&nbsp;<br/>
  </div>
  <div id="fragment-2">
    <div style="float:left;width:100%">
        <a href="{url alias='users'}">Users</a>
    </div>
    <br/>&nbsp;<br/>
  </div>
  <div id="fragment-3">
     Orders
  </div>
  <div id="fragment-4">
        <a href="{url alias='setup'}">Main</a>
        &nbsp;
        <a href="{url alias='countries'}">Countries</a>
        &nbsp;
        <a href="{url alias='offers'}">Offers</a>
        &nbsp;
        <a href="{url alias='vat'}">Vat</a>
        &nbsp;
        <a href="{url alias='categories'}">Categories</a>
        &nbsp;
        <a href="{url alias='attribute'}">Attributes</a>
    <br/>&nbsp;<br/>
  </div>
  <div id="fragment-5">
  <div style="float:left;width:100%">
        <a href="{url alias='search_attribute'}">Search attributes</a>
    </div>
    <br/>&nbsp;<br/>
  </div>
</div>
 
<script>
$( "#tabs" ).tabs();
</script>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        {include file=$model}
      </div>
    </div>

    <div class="container">
      
      </div>

      <hr>

      <footer>
        <p>&copy; Helium by PAQUET Judicaël 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>