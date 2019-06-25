@extends('layouts.master')
@section('title')
    Escapism - Dev Blog
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-body">
            <h4><span class="glyphicon glyphicon-list-alt"></span> Project updates and developer notes:</h4>
        </div>
    </div>

    {{--Actual content--}}
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Project Escapism; What worked, didn't work and what could be done.</h3>
        </div>
        <div class="panel-body">
            It has been a lot of fun developing Escapism.com and an awesome learning experience. But in this section
            we will be reflecting on the things that went well, not so well and also anything that could be changed to
            make Escapism a better experience.

            <h4><u>What we couldn't get working in v1.*</u></h4>
            <ul>
                <li>
                    <strong>The Profile page -</strong> This page ended up taking a bit of a backseat in the first iteration of
                    this site. We're hoping a full user profile feature can be implimented in the future
                </li>
                <li>
                    <strong>User Profile -</strong> Right now, the site only supports one user at a time. And this user cannot sign
                    in or out. Multiple users, as a feature, was thought to be something that might not need to implemented
                    straight away, so that's a "coming soon" feature. We'll also add the ability to change/update user names,
                    bio and profile picture.
                </li>
                <li>
                    <strong>The Search function -</strong> At the start of development, this feature was a priority. But
                    as we went through the dev cycle, other things kept coming up that seemed more important to have working
                    for v1.0. This will be an important and useful feature in later versions.
                </li>
                <li>
                    <strong>Settings and Other Features -</strong> As the site is now, Settings, FAQ, bug reporting and the ability
                    to log out don't work at all. This will be changed very soon.
                </li>
                <li>
                    <strong>Proper page responsiveness - </strong> The Escapism websites different pages are all responsive, to a point.
                    From large to mid size displays, they work fine. But once it gets to a small display, the page just go crazy and messes up.
                </li>
            </ul>
            As it stands, we're very happy with the features and functionality that was implemented into Escapism.com. We believe
            that the site shows the amount of dedication and love that was put into it's development. Adding little extra things here
            and there such as a user bio, lots of cool icons and a sweet profile picture. We also hope you enjoyed out little
            "no posts" easter egg!
            <br>
            For now we hope you enjoy the things we <i>have</i> been able to implement. We're happy to say that we implimented
            everything we could in regards to the requirements given to us. The aforementioned features are soon
            to arrive though!
            <br>
            <br>
            <br>
            If you're interested in seeing the relational diagrams for our database, please view them <a href="blog/diagrams">here</a>!
        </div>
    </div>



    {{--Return to the home page--}}
    <a href="/" class="btn btn-info btn-lg btn-block" role="button">
        <span class="glyphicon glyphicon-home"></span> Return Home</a>
@stop