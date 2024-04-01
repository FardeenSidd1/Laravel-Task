
    @extends('frontend.layouts.app')
    @section('content')
     <section>
          <div class="container">
               <div class="text-center">
                    <h1>{{ $contact->title }}</h1>

                    <br>

                    <p class="lead">{{ $contact->content }}</p>
               </div>
          </div>
     </section>
     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="{{ route('admin.user-contacts.store') }}" method="post">
                              @csrf
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
                    
                                   <input type="email" class="form-control" placeholder="Enter email address" name="email" required>

                                   <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="description" required></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="{{asset('frontend/images/contact-1-600x400.jpg')}}" class="img-responsive" alt="">
                         </div>
                    </div>

               </div>
          </div>
     </section>       


@endsection

