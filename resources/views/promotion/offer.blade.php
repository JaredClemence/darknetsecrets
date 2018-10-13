@extends('layouts.landing')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Learn to surf the Internet without being traced.</h1>
        </div>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">Surf the Internet without being traced</h1>
        <p class="lead">It's easy if you know how. Register below.</p>
    </div>
    <div class="row">
        <div class="col-10 offset-xs-1 col-md-8">
            <h2>Coming Soon!<br/>Surf the Internet without being traced</h2>
            <h3>Free training about Internet privacy.</h3>
            <div class="alert alert-warning">
                <strong>Limited Class Size:</strong> Class registration is first-come first-serve.
            </div>
            <h1>Learn how to:</h1>
            <ul class="group-list">
                <li class="list-group-item"><strong>use a simple, free software</strong> to bounce your Internet signal around the globe like a hacker.</li>
                <li class="list-group-item"><strong>search for anything without leaving a trace</strong>.</li>
                <li class="list-group-item"><strong>know if your email is visible</strong> to strangers.</li>
            </ul>
            <img src="{{ asset('image/fb-posts/WarJournalists.png') }}" class="img img-fluid" />
            <p><small>Millions of people feel unsafe, because big corporations and big government can track your every move. Learn how to hide.</small></p>
            <p>
                <strong>You are being watched.</strong> Facebook, Apple, Google, and even your own government are 
                making tick marks on a list every time you visit a web page. They know your likes, 
                your hobbies, your interests, and even where you are sitting right this very minute.
            </p>
            <p>
                In several cases, they were even able to tell when women were pregnant <em>before</em> 
                they took pregnancy tests. Target was sued for this very issue in 2012 when they informed 
                a father that his 14-year-old daughter was expecting a child within 9 months. 
                (See the article written by Forbes Magazine the details of this scary tale: 
                <a href="https://www.forbes.com/sites/kashmirhill/2012/02/16/how-target-figured-out-a-teen-girl-was-pregnant-before-her-father-did/#7195ee776668" target="_blank">
                    "How Target Figured Out A Teen Girl Was Pregnant Before Her Father Did"</a>)
            </p>

            <h3>You must protect your privacy</h3>
            <p>Sign up for a free class. We will show you how to surf the internet 
                without being tracked.</p>
            <ul class="group-list">
                <li class="list-group-item">Hide what you are reading.</li>
                <li class="list-group-item">Prevent advertisers from learning your interests.</li>
                <li class="list-group-item">Stop others from compiling lists of your online activity.</li>
            </ul>
        </div>
        <div class="col-10 offset-xs-1 col-md-4">
            <img src="{{ asset('image/fb-posts/BounceTheSignal.png') }}" class="img img-fluid" />
            <p><small>You will learn how to bounce your connection around the world to hide your true location.</samll></p>
            <section  style="border:black solid 1px; border-radius:15px; padding: 1rem; background-color: #aae0f1;">
                <h2>Register Now</h2>
                <p>Be the first to know when the free workshop is ready and learn hide your Internet activity like a professional.</p>
                <form method="post" action="{{$createUrl}}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" name="email" type="email" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form><br/>
                <p>
                    By clicking the &quot;Register&quot; button, you accept the terms and conditions described here: 
                    <a href="{{ url('/terms') }}" target="_blank">
                    Terms & Conditions
                    </a>
                    (Terms & Conditions will open in a separate window, tab, or screen)
                </p>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h1>Make sure you have:</h1>
            <ul class="group-list">
                <li class="list-group-item">A computer, cell phone, or tablet.</li>
                <li class="list-group-item">An Internet connection.</li>
                <li class="list-group-item">Approximately 60 minutes.</li>
            </ul>
        </div>
    </div>
</div>
@endsection