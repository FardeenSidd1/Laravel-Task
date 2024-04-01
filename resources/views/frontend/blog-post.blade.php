
   
@extends('frontend.layouts.app')
@section('content')
     <section>
          <div class="container">
               <div class="text-center">
                    <h1>{{ $blog->title }}</h1>

                    <br>

                    <p class="lead">{{ $blog->content }}</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">
                    <div class="col-lg-3 pull-right col-xs-12">
                         <div class="form">
                              <form action="#">
                                   <div class="form-group">
                                        <label class="control-label">Blog Search</label>

                                        <div class="input-group">
                                             <input type="text" class="form-control" placeholder="Search for...">
                                             <span class="input-group-btn">
                                                  <button class="btn btn-default" type="button">Go!</button>
                                             </span>
                                        </div>
                                   </div>
                              </form>
                         </div>

                         <br>

                         <label class="control-label">Lorem ipsum dolor sit amet</label>

                         <ul class="list">
                              <li><a href="blog-post-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></li>
                              <li><a href="blog-post-details.html">Et animi voluptatem, assumenda enim, consectetur quaerat!</a></li>
                              <li><a href="blog-post-details.html">Ducimus magni eveniet sit doloremque molestiae alias mollitia vitae.</a></li>
                         </ul>
                    </div>

                    <div class="col-lg-9 col-xs-12">
                         <div class="row">
                              <div class="col-sm-6">
                                   <div class="courses-thumb courses-thumb-secondary">
                                        <div class="courses-top">
                                             <div class="courses-image">
                                                  @if(isset($blog->image))
                                                  <img src="{{ asset('storage/blog/' . $blog->image) }}" alt="Image Preview" style="width:280px;height:280px;">
                                              @endif                                             </div>
                                             <div class="courses-date">
                                                  <span title="Author"><i class="fa fa-user"></i> {{ $blog->user->name }}</span>
                                                  <span title="Date"><i class="fa fa-calendar"></i> {{ $blog->created_at }}</span>
                                                  <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                             </div>
                                        </div>

                                        <div class="courses-detail">
                                             <h3><a href="{{ route('frontend.blogDetails') }}">{{ $blog->content }}</a></h3>
                                        </div>

                                        <div class="courses-info">
                                             <a href="{{ route('frontend.blogDetails') }}" class="section-btn btn btn-primary btn-block">Read More</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-sm-6">
                                   <div class="courses-thumb courses-thumb-secondary">
                                        <div class="courses-top">
                                             <div class="courses-image">
                                                  <img src="{{asset('frontend/images/product-2-720x480.jpg')}}" class="img-responsive" alt="">
                                             </div>
                                             <div class="courses-date">
                                                  <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                                  <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                                  <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                             </div>
                                        </div>

                                        <div class="courses-detail">
                                             <h3><a href="blog-post-details.html">Tempora molestiae, iste, consequatur unde sint praesentium!</a></h3>
                                        </div>

                                        <div class="courses-info">
                                             <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                                        </div>
                                   </div>
                              </div>

                              
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="gridSystemModalLabel">Book Now</h4>
                    </div>
                    
                    <div class="modal-body">
                         <form action="#" id="contact-form">
                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Pick-up location" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Return location" required>
                                   </div>
                              </div>

                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Pick-up date/time" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Return date/time" required>
                                   </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Enter full name" required>

                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter email address" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter phone" required>
                                   </div>
                              </div>
                         </form>
                    </div>

                    <div class="modal-footer">
                         <button type="button" class="section-btn btn btn-primary">Book Now</button>
                    </div>
               </div>
          </div>
     </div>

     @endsection

   
