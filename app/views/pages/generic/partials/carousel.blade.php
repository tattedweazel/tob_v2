<!-- Carousel
        ================================================== -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Learn About Your "Friends"</h1>
                  <p>You've surrounded yourself with like-minded people who generally value your worth and existence. Right? Are those whom you call 'friend' the unwavering allies they claim to be?</p>
                  <p>
                    @if (!$current_user)
                    {{ link_to_route('register_path', 'Find out now', null, ['class' => 'btn btn-lg btn-primary', 'role' => 'button' ]) }}
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAGZmZgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Learn About Yourself</h1>
                  <p>Loyal friend or back-stabbing fiend, who do you become when the pressure is on? The Trust.or.Betray experience just may reveal a part of yourself you didn't even know existed.</p>
                  <p>
                  @if (!$current_user)
                  {{ link_to_route('register_path', 'Discover yourself', null, ['class' => 'btn btn-lg btn-primary', 'role' => 'button' ]) }}
                  @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Learn About Game Theory</h1>
                  <p>The Trust.or.Betray experience is based on a popular game theory exercise. Take a deeper look into why rational people work together towards a common goal... or why they don't.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn More</a></p>
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div><!-- /.carousel -->