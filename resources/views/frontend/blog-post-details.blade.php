
     @extends('frontend.layouts.app')
     @section('content')
     <section>
          <div class="container">
               <h2>{{ $blog->title }}</h2>

               <p class="lead">
                    <i class="fa fa-user"></i> {{ $blog->user->name }} &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-calendar"></i> {{ $blog->created_at }} &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-eye"></i> 114
               </p>

               <img src="{{asset('frontend/images/other-image-fullscreen-1-1920x700.jpg')}}" class="img-responsive" alt="">

               <br>

               <h3>{{ $blog->content }}</h3>
               

               <p>{{ strip_tags($blog->description) }}</p>

               

               <br>
               <br>

               <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                         <h4>Social share</h4>

                         <p>
                              <a href="#" target="_blank"><i class="fa fa-facebook"></i></a> &nbsp;&nbsp;&nbsp;

                              <a href="#" target="_blank"><i class="fa fa-twitter"></i></a> &nbsp;&nbsp;&nbsp;

                              <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                         </p>

                         <br>


                         <h4>Other posts</h4>

                         <ul class="list">
                              <li><a href="blog-post-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></li>
                              <li><a href="blog-post-details.html">Et animi voluptatem, assumenda enim, consectetur quaerat!</a></li>
                              <li><a href="blog-post-details.html">Ducimus magni eveniet sit doloremque molestiae alias mollitia vitae.</a></li>
                         </ul>
                    </div>

                    <div class="col-md-8 col-xs-12">
                         <h4>Comments</h4>

                         <p>No comments found.</p>

                         <br>
                         
                         <h4>Leave a Comment</h4>

                         <form action="#" class="form">

                              <div class="row">
                                   <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                             <label class="control-label">Name</label>

                                             <input type="text" name="name" class="form-control">
                                        </div>
                                   </div>

                                   <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                             <label class="control-label">Email</label>

                                             <input type="email" name="email" class="form-control">
                                        </div>
                                   </div>
                              </div>

                              <div class="form-group">
                                   <label class="control-label">Message</label>

                                   <textarea name="comment" class="form-control" rows="10" autocomplete="off"></textarea>
                              </div>

                              <button type="submit" class="section-btn btn btn-primary">Submit</button>
                         </form>
                    </div>
               </div>
          </div>
     </section>
@endsection