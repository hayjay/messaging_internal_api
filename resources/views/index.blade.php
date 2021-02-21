<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome to StreamGo's Messaging App</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          
        </div>
        <div class="col-sm">
          <h1>Hi there 👋</h1>
        </div>
        <div class="col-sm">
          
        </div>
        <!-- <h4>Start By Creating a New Message today and select the Author.</h4> -->
      </div>

      <div class="row mt-4">
        <h4> Welcome! Start by creating a new message with its author.</h4>
      </div>

      <div class="clearfix">
        
      </div>
      <div class="row mt-4">
        <div class="col-sm-6">
          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
              {{ session()->get('success') }}
            </div>
          @endif
          <form method="POST" action="{{route('store_message')}}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="exampleInputEmail1">Message Subject</label>
              <input type="text" class="form-control" name="message_subject" value="{{ old('message_subject') }}" id="" aria-describedby="" placeholder="Enter message subject">
              @if ($errors->has('message_subject')) <small id="emailHelp" class="form-text text-muted">{{ $errors->first('message_subject') }}.</small> @endif
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Message Body</label>
              <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter message body or content" name="message_body">{{ old('message_body') }}</textarea>
              @if ($errors->has('message_body')) <small id="" class="form-text text-muted">{{ $errors->first('message_body') }}.</small> @endif
            </div>

            <div class="form-group">
              <label for="">Author</label>
              <select name="author_id" id="input" class="form-control" required="required">
                <option value="">Select One</option>
                @if(isset($authors) && count($authors) > 0)
                  @foreach($authors as $author)
                    <option value="{{ $author['id'] }}" @if(old('author_id') == $author['id']) selected="" @endif> {{ $author['name'] }} </option>
                  @endforeach
                @endif
              </select>
              @if ($errors->has('author_id')) <small id="" style="color:red" class="form-text text-muted">{{ $errors->first('author_id') }}.</small> @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
        </div>
        
      </div>



      <div class="row mt-4">

        <data class="col-sm-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Message Subject</th>
                <th scope="col">Message Body</th>
                <th scope="col">Author</th>
                <th scope="col">Date Created</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($messages) && count($messages) > 0)
                @foreach($messages as $message)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $message['subject'] }}</td>
                    <td>{{ $message['body'] }}</td>
                    <td>{{ $message['author'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}</td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </data>
        
      </div>
      <br>

      
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>