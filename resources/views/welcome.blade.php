<!DOCTYPE html>
<html>
    <head>
        <title>Talented Europe</title>
        <link rel="stylesheet" type="text/css" href="{{ elixir("css/style.css") }}">
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:200,400,700,400italic,200italic,700italic,900' rel='stylesheet' type='text/css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-landing navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="{{ URL::asset('img/logo-header-alt.png') }}" alt="Talented Europe"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#about">About</a></li>
                <li><a href="#subscribe">Subscribe</a></li>
              </ul>
            </div>
          </div>
        </nav>

        <header class="hero">
            <div class="hero-video">
              <div class="hero-video-overlay"></div>
              <div class="video-bg cover">
                <div class="video-fg">
                    <iframe width="100%" height="100%" src="http://www.youtube.com/embed/E8Cnjb4w3x0?version=3&autoplay=1&loop=1&playlist=E8Cnjb4w3x0&rel=0&controls=0" 
                        frameborder="0" allowfullscreen></iframe>
                </div>
              </div>              
            </div>
            <div class="container">
                <div class="row content">
                      <h1>Linking <strong>young talent</strong> to <strong>employers</strong> across <strong>europe</strong></h1>
                      <p><a href="#about" class="btn btn-primary">Find more</a></p>
                </div>
            </div>
        </header>


        <div class="container">

            <div class="about content">
                <div class="row xs12">
                    <h1>What is Talented Europe</h1>
                    <p>Can you imagine being able to hire the best students in whichever European country? Would you like to be part of the elite student sector in Europe? Thousands of companies will have direct access to your contact information, and the better marks you get the greater choices you will have to get a nice job.</p>

                    <p>That is what Talented Europe offers. A showcase with a ranking of the best students in Europe. A simple idea which joins employers and students. The meeting point of excellence.</p>

                    <p><a href="" class="btn btn-primary">Download the brochure</a></p>
                </div>
            </div>

            <div class="subscribe content">
                <div class="row xs12">
                    <h1>Subscribe</h1>
                    <div id="mc_embed_signup">
                    <form action="//talentedeurope.us13.list-manage.com/subscribe/post?u=b4e15aa0a9873bc5785280c76&amp;id=2854c91856" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                        
                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b4e15aa0a9873bc5785280c76_2854c91856" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


        </div>




    </body>
</html>
