<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('home/style.css')}}">


    <title>Document</title>
</head>
<body>
    <header>
        <a href="{{route('index')}}" class="logo">Mo</a>
        <ul class="navbar">
            <li><a href="{{route('create')}}">Add Album</a></li>
            <li><a href="{{route('create.Picture')}}">Add Pictures</a></li>

        </ul>
    </header>
  <div class="warpper">
      @foreach($albums as $album)
    <div class="card">
      <img src="{{asset('AlbomPictures/'.$picture->path)}}" alt="">
      <div class="info">
        <h1>{{$album->name}}</h1>

        <a href="{{route('collection',$album->id)}}" class="btn">Show Pictures</a>
          <button type="button" class="btn btn-primary" style="margin-top: 120px;margin-right: 30px" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Event Click
          </button>
      </div>

    </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          ...
                      </div>
                      <div class="modal-footer">
                          <form action="{{route('destroyAlbum',$album->id)}}" method="post">
                              @method('POST')
                              @csrf
                              <button type="submit" class="btn btn-danger" style="color: white;background-color: #620008;border: none;">Delete</button>
                          </form>
                          <button type="button" class="btn btn-primary"><a href="{{ route('movePicture',$album->id) }}">Move Picture</a></button>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
