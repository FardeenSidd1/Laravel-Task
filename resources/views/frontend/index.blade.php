
@extends('frontend.layouts.app')
@section('content')
     <!-- HOME -->
     <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>{{ $blog->title }}</h1>
                                        <h3>{{ $blog->content }}</h3>
                                        <a href="{{ route('frontend.blogDetails') }}" class="section-btn btn btn-default">Read Blog</a>
                                   </div>
                              </div>
                         </div>
                    </div>

                   
               </div>
          </div>
     </section>

     <main>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="text-center">
                                   <h2>{{ $about->title }}</h2>

                                   <br>

                                   <p class="lead">{{ $about->content }}</p>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>{{ $blog->title }}<small>{{ $blog->content }}.</small></h2>
                              </div>
                         </div>

                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="{{ asset('storage/blog/' . $blog->image) }}" alt="Image Preview" style="width:280px;height:280px;">
                                        </div>
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

                         
                    </div>
               </div>
          </section>
     </main>

     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="{{ route('admin.user-contacts.store') }}" method="post">
                              @csrf
                              <div class="section-title">
                                   <h2>{{ $contact->title }}<small>{{ $contact->content }}</small></h2>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
                    
                                   <input type="email" class="form-control" placeholder="Enter email address" name="email" required>

                                   <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="{{asset('frontend/images/contact-1-600x400.jpg')}}" class="img-responsive" alt="Smiling Two Girls">
                         </div>
                    </div>

               </div>
          </div>
     </section>       

 

@endsection