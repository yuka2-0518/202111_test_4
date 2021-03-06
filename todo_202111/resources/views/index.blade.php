<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDolist</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>




</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ToDo') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>



    <div class="wrapper">
        <form action="/index" method="post">
        {{-- <form action="{{ route('index', [$task]) }}" method='post'> --}}
            @csrf
            <div class="post-box">
                <input type="text" name="cat" placeholder="???????????????">
                <input type="text" name="task" placeholder="?????????">
                <input type="date" name="duedate" placeholder="??????">
                {{-- <input type="date" value="2017-06-01"> --}}
                <input type="text" name="prio" placeholder="?????????">
                <input type="text" name="flag" placeholder="?????????">

                <button type="submit" class="submit-btn">???????????????</button>
            </div>
        </form>


        <div class="task-wrapper">
        @foreach($tasks as $task)
            <div class="task-box">

              @if($task->user_id == Auth::user()->id)
              <div>????????????:{{ $task ->user ->name }}</div>
              <div>???????????????:{{ $task->cat }}</div>
              <div>?????????   :{{ $task->task }}</div>
              <div>??????     :{{ $task->duedate }}</div>
              <div>?????????   :{{ $task->prio}}</div>
              <div>??????     :{{ $task->flag }}</div>
              @endif
            
              <div class="destroy-btn">
                @if($task->user_id == Auth::user()->id)
                {{-- **???-1 18???00******************************* ************************ --}}
                <form action="{{ route('destroy', [$task->id]) }}" method='post'>
                  @csrf
                    <input type="submit" value="??????">
                </form>
                @endif
              </div>
            </div>
        @endforeach 
        </div>
    </div>


    
</body>
</html>