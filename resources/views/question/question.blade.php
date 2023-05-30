@extends('layout.app')
@section('title', 'Question')
@section('content')
<div class="row mt-4 mb-4 justify-content-center">
    <div class="col-lg-8">
            <!-- Create Question Button -->
            <div class="text-right mb-4">
              <a href="#" class="btn btn-primary">Add Question</a>
            </div>
        
            <!-- Question List -->
            <div class="card">
              <div class="card-header">
                <h5>Question title: 2</h5>
              </div>
              <div class="card-body">
                <p>Questions details: This is the content of Question 1.</p>
                <a href="#" class="btn btn-sm btn-info">View Answers</a>
              </div>
            </div>
        
            <div class="card mt-3">
              <div class="card-header">
                <h5>Question title: 2</h5>
              </div>
              <div class="card-body">
                <p>Questions details: This is the content of Question 2.</p>
                <a href="#" class="btn btn-sm btn-info">View Answers</a>
              </div>
            </div>
        </div>
    </div>
@endsection