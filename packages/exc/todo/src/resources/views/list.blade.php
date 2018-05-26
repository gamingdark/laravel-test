<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo by ExC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
            }

            .title {
                font-size: 84px;
            }
            
            .todo-item {
                color: black;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    To-Do List
                </div>
                <div class="todo-list">
                @foreach ($items as $item)
                    <div class="todo-item">
                        <div class="toto-text">{{$item->text}}</div>
                        <div class="todo-links">
                            <a href="{{url('/todo/edit')}}/{{$item->id}}">Edit</a>
                            <a href="{{url('/todo/delete')}}/{{$item->id}}">Delete</a>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="create">
                    <form action = "{{url('/todo/create')}}" method = "get">
                        <textarea name='text'></textarea>
                        <input type = 'submit' value = "Add to-do item"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>