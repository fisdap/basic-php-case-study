@extends('layout')

@section('content')
  <div class="hero">
    <div class="hero-content">
      <h1>Not Another Task Manager</h1>
      <p class="tagline">
        But I assure you, we do it <em>better</em>.
      </p>
      <p>
        <a href="/auth/register" class="btn btn-success">Sign Up Today</a>
      </p>
    </div>
  </div>

  <div class="about">
    <div class="container">
      <h2 class="text-center">Our Killer Features</h2>
      <div class="row">
        <div class="col-xs-12 col-sm-4 text-center">
          <div class="card">
            <i class="fa fa-home fa-5x"></i>
            <h3>Series</h3>
            <p>
              Series give tasks homes that categorize them and keep them clean.
            </p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 text-center">
          <div class="card">
            <i class="fa fa-check fa-5x"></i>
            <h3>Tasks</h3>
            <p>
              Tasks can contain a name and a description, no more, no less.
            </p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 text-center">
          <div class="card">
            <i class="fa fa-list-ul fa-5x"></i>
            <h3>Categories</h3>
            <p>
              Different categories helps you keep your tasks in order.
            </p>
          </div>
        </div>
      </div>

      <p class="text-center quote">
        "You've never seen task management done <strong>so</strong> well"
      </p>
    </div>
  </div>

  <div class="testimonials">
    <div class="container">
      <div class="headline">
        <h2>Don't Believe Us?</h2>
        <p>
          I wouldn't either, but hey, take these peoples words for it
        </p>
      </div>

      <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel" data-slide-to="0" class="active"></li>
          <li data-target="#carousel" data-slide-to="1"></li>
          <li data-target="#carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/dist/img/gran.jpg" alt="Grandma">
            <div class="carousel-caption">
              <h3>Grandma Pat</h3>
              <p>"I can see my grandkids everyday now that I have this task manager"</p>
            </div>
          </div>
          <div class="item">
            <img src="/dist/img/oldman.jpg" alt="Serious Man">
            <div class="carousel-caption">
              <h3>Gustavo Fring</h3>
              <p>"This task manager gave me the time to do what I want. Walk alone in this field"</p>
            </div>
          </div>
          <div class="item">
            <img src="/dist/img/laxin.jpg" alt="Laxin' kid">
            <div class="carousel-caption">
              <h3>Billy Bob</h3>
              <p>"Look at all of this time I have"</p>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>

  <div class="cta">
    <div class="container">
      <div class="headline text-center">
        <h2>Ready to give us a shot?</h2>
      </div>

      <p class="text-center">
        <a href="/auth/register" class="btn btn-success">Register today!</a>
      </p>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <h3>Not Another Task Manager</h3>
          <p>
            This landing page was made to have some fun with this case study. But really this is a great task manager.
          </p>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-3">
          <h3>Connect</h3>
          <p>
            <a href="#">Twitter</a>
          </p>
          <p>
            <a href="#">Facebook</a>
          </p>
          <p>
            <a href="#">Instagram</a>
          </p>
        </div>
        <div class="col-xs-12 col-sm-2">
          <h3>Contact</h3>
          <p>
            <a href="#">Email</a>
          </p>
          <p>
            <a href="#">Phone</a>
          </p>
          <p>
            <a href="#">Live Chat</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

@endsection
