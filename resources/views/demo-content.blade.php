@extends('layouts.admin')

@section('content')
<div style=" margin-top: 150px" class="test_content">
    <h3 class="text-underline--dashed text-center text-danger">Test Content</h3>
    <div class="card" style="width: 18rem;">

        <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
        <div class="card-body">
            <h5  class="card-title text-success">I am a demo Card for testing</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>
@endsection