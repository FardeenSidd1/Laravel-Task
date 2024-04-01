
    
@extends('frontend.layouts.app')
@section('content')
     <section>
          <div class="container">
               <div class="text-center">
                    <h1>{{ $about->title }}</h1>

                    <br>

                    <p class="lead">{{ $about->content }}</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">
                    <div class="col-md-offset-1 col-md-4 col-xs-12 pull-right">
                         @if(isset($about->image))
                         <img src="{{ asset('storage/about/' . $about->image) }}" alt="Image Preview" style="width:280px;height:280px;">
                     @endif  
                    </div>

                    <div class="col-md-7 col-xs-12">
                         <div class="about-info">
                              <h2>Outline your company story</h2>

                              <figure>
                                   <figcaption>
                                        <p>{{ strip_tags($about->description) }}</p>

                                        
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     

   

@endsection

