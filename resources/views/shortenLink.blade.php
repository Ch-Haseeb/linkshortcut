<!DOCTYPE html>
<html>
<head>
    <title>URL's Shortner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  #myInput {
  border-top-style: hidden;
  border-right-style: hidden;
  border-bottom-style: hidden;
  border-left-style: hidden;
  /* border-bottom-style: groove; */
}

.no-outline:focus {
  outline: none;
}
</style>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  // copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
}
</script>
<body>
<div class="container">
    <h1 style="text-align:center">URL's Shortner</h1>
   
    <div class="card">
      <div class="card-header">
        <form method="POST" action="link">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Short Now</button>
              </div>
            </div>
        </form>
      </div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      @if (Session::has('success'))
      <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
              <p>{{$shortLinks->link}}</p>
             <a href="{{ route('shorten.link', $shortLinks->code) }}" target="_blank"><input style="width: 21%; color:blue;" readonly class="no-outline" type="text" value="{{ route('shorten.link', $shortLinks->code) }}" id="myInput" ></a> 
              <i  onclick="myFunction()" class="fa fa-clipboard" style="font-size:24px;color:#28a745"></i>
      </div>
      @endif 
    </div>
   
</div>
    
</body>
</html>