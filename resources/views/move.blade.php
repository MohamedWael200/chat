<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('form/style.css')}}">

    <title> Add Admin Info</title>
</head>
<body>

<!-- MAIN -->
<main>
    <!-- form Add Info -->
    <div class="contact-box">
        <div class="lefts"></div>
        <form action="{{route('changePicAlbom')}}" method="post">
            @csrf
            <div class="right">
                <h2>Info</h2>
                <input type="hidden" name="albomId" value="{{$info->id}}">
                <select name="albom" id="res" class="field" width="100" >
                    @foreach($albom as $alboms)
                        <option value="{{$alboms->id}}">
                            {{$alboms->name}}
                        </option>
                    @endforeach
                </select>
                <button class="btn">Send</button>
            </div>
        </form>

    </div>


</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="{{asset('form/script.js')}}"></script>
</body>
</html>
