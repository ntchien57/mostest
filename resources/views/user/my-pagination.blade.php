<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/template/css/style.css">
    <title>Document</title>
    <style> 
    .center{
        text-align: center;
        padding-bottom: 3rem;
    }
    .pagination1 {
        display: inline-block;
        width: auto !important;
    }
    
    .pagination1 a {
        color: black;
        float: left;
        padding: 6px 12px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;

    }
    
    .pagination1 a.active1 {
        background-color: rgb(228, 38, 32);
        color: white;
        border: 1px solid rgb(228, 38, 32);
    }
    
    .pagination1 a:hover:not(.active1) {
        background-color: #ddd;
    }</style>
</head>
<body>
@if ($paginator->hasPages())
    <div class="center">
        <div class="pagination1">
            @if ($paginator->onFirstPage())
                <a href="#">&#60;</a>
            @else
                <a class="" href="{{ $paginator->previousPageUrl()}}">&#60;</a>
            @endif

            @foreach ($elements as $element)

                @if (is_string($element))
                    <a href="">{{ $element }}</a>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="" class="active1">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl()}}">&#62;</a>
            @else
                <a href="#">&#62;</a>
            @endif
        </div>
    </div>
@endif

</body>
</html>
