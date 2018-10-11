@extends('layouts.landing')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Learn to surf the Internet without being tracked</h1>
        </div>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">Surf the Internet without being tracked</h1>
        <p class="lead">It's easy to do if you know how. Register below.</p>
    </div>
    <div class="row">
        <div class="col-10 offset-xs-1 col-md-8">
            <h2>Coming Soon!<br/>Learn to surf the Internet without being tracked</h2>
            <div class="alert alert-warning">
                <strong>Limited Class Size:</strong> Class registration is first-come first-serve.
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
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
                </div>
                <div class="col-12 col-md-6">
                    <img src="{{ asset('image/fb-posts/WarJournalists.png') }}" class="img img-fluid" />
                    <p><small>Millions of people feel unsafe, because big corporations and big government can track your every move. Learn how to hide.</small></p>
                </div>
            </div>
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
            <section  style="border:black solid 1px; border-radius:15px; padding: 1rem;">
                <h2>Register Now</h2>
                <p>Be the first to know when the free workshop is ready. Learn to be invisible on the Internet.</p>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" name="email" type="email" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>You Will Learn...</h1>
            <ul class="group-list">
                <li class="list-group-item">How to <strong>use a simple free software</strong> to bounce your Internet signal around the globe like a hacker.</li>
                <li class="list-group-item">How to <strong>search for anything without leaving a trace</strong>.</li>
                <li class="list-group-item">How to <strong>know if your email is visible</strong> to strangers.</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>You Will Need...</h1>
            <ul class="group-list">
                <li class="list-group-item">A computer, cell phone, or tablet.</li>
                <li class="list-group-item">An Internet connection.</li>
                <li class="list-group-item">Approximately 60 minutes.</li>
            </ul>
        </div>
    </div>
</div>
@endsection