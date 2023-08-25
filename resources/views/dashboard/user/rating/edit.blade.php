@extends('dashboard.user.layouts.main')
{{-- @dd($data) --}}
@section('container')
<div class="container d-flex justify-content-center user-select-none" style="padding-top: 3rem">

    <div class="card text-center mb-5" style="width: 80%">

        <div class="circle-image">
            <img class="bg-light" src="@if ($user->image === null)
            {{ asset('storage/user-pictures/default.svg') }}
        @else   
            {{ asset('storage/'.auth()->user()->image) }}
        @endif" width="50">
        </div>

        <span class="name mb-1 fw-500">{{ $user->name }}</span>
        <small class="text-black-50">{{ $user->username }}</small>

        <form action="/users/{{ $user->username }}/dashboard/courses/{{ $data->id }}/review" method="post">
            @method('put')
            @csrf
            <input type="hidden" name="course_id" value="{{ $data->id }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            {{-- review --}}
            <div class="location mt-4">
                <div class="mb-3 px-5">
                    <label for="exampleFormControlTextarea1" class="form-label">Review</label>
                    <textarea class="form-control @error('review')
                        is-invalid
                    @enderror" id="exampleFormControlTextarea1" name="review" rows="3" required>{{ old('review', $data->review) }}</textarea>
                    @error('review')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
    
            {{-- rating --}}
            <div class="rate bg-primary py-3 text-white mt-3">
                
                <h6 class="mb-0">Provide your feedback on the quality of your course-taking experience by rating it.</h6>
    
                <div class="rating"> 
                    @foreach (array_reverse(range(1, 5)) as $i)
                        <input type="radio" name="rating" value="{{ $i }}" id="{{ $i }}" @if ($i == $data->rating)
                            @checked(true)
                        @endif><label for="{{ $i }}">☆</label> 
                    @endforeach
                </div>
    
                <div class="buttons px-4 mt-0">
    
                <button class="btn btn-warning btn-block rating-submit" type="submit">Submit</button>
        </form>
            
        </div>

    </div>
@endsection

@section('custom-css')
    <style>
        .card{

width: 350px;
border: none;
box-shadow: 5px 6px 6px 2px #e9ecef;
border-radius: 12px;
}

.circle-image img{

border: 6px solid #fff;
border-radius: 100%;
padding: 0px;
top: -28px;
position: relative;
width: 70px;
height: 70px;
border-radius: 100%;
z-index: 1;
background: #e7d184;
cursor: pointer;

}


.dot {
  height: 18px;
width: 18px;
background-color: blue;
border-radius: 50%;
display: inline-block;
position: relative;
border: 3px solid #fff;
top: -48px;
left: 186px;
z-index: 1000;
}

.name{
margin-top: -21px;
font-size: 18px;
}


.fw-500{
font-weight: 500 !important;
}


.start{

color: green;
}

.stop{
color: red;
}


.rate{

border-bottom-right-radius: 12px;
border-bottom-left-radius: 12px;

}



.rating {
display: flex;
flex-direction: row-reverse;
justify-content: center
}

.rating>input {
display: none
}

.rating>label {
position: relative;
width: 1em;
font-size: 30px;
font-weight: 300;
color: #FFD600;
cursor: pointer
}

.rating>label::before {
content: "\2605";
position: absolute;
opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
opacity: 1 !important
}

.rating>input:checked~label:before {
opacity: 1
}

.rating:hover>input:checked~label:before {
opacity: 0.4
}


.buttons{
top: 36px;
position: relative;
}


.rating-submit{
border-radius: 15px;
color: #fff;
    height: 49px;
}


.rating-submit:hover{

color: #fff;
}
    </style>
@endsection