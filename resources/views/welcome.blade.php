<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap");

        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg-accent: hsl(210, 8%, 90%);
            --text-clr: hsl(210, 47%, 60%);
            --icon-clr: rgb(17, 175, 38);

            --space-2: 2rem;
            --space-175: 1.75rem;
            --space-15: 1.5rem;
            --space-125: 1.25rem;
            --space-1: 1rem;
            --space-05: 0.5rem;
            --space-025: 0.25rem;

            --easing: cubic-bezier(0.5, 0, 0.2, 1);
            --easing1: cubic-bezier(0.4, 0.3, 0.65, 1);
            --easing2: cubic-bezier(0.8, 0, 0.6, 1);
            --easing3: cubic-bezier(0, 0.2, 0.25, 1);

            --sharp-shadow: 0px 2px 1px 0 #0001, 0 0.125em 0.25em 0.0625em #0002,
            0 0.2em 0.5em #0002;
        }

        li {
            list-style: none;
        }

        body {
            font: 16px/1.2 "Montserrat", sans-serif;
            /*background: linear-gradient(135deg, #f5af19 0%, #f12711 100%);*/
            background: linear-gradient(45deg, hsl(46, 81%, 75%), hsl(284, 64%, 79%));
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 60rem;
            min-height: 100vh;
            margin-inline: auto;
            padding: 2rem;
        }

        .todo__container {
            --header-height: calc(100% / 2.5);
            --content-height: calc(100% - var(--header-height));
            width: 19rem;
            height: 30rem;
            background-color: #fff;
            border-radius: var(--space-05);
            box-shadow: var(--sharp-shadow);
            overflow: hidden;
        }

        .header {
            display: flex;
            flex-direction: column;
            position: relative;
            height: var(--header-height);
            overflow: hidden;
            background-image: url("https://www.incimages.com/uploaded_files/image/1920x1080/getty_913407976_420417.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .header::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .figure {
            display: flex;
            justify-content: end;
            position: relative;
            background-image: url("https://www.incimages.com/uploaded_files/image/1920x1080/getty_913407976_420417.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .title__caption {
            display: flex;
            flex-direction: column;
            z-index: 10;
            line-height: 1.1;
            top: calc(var(--header-height) + var(--space-2));
            position: absolute;
            margin-inline: var(--space-05);
        }

        .title {
            align-self: flex-end;
            text-shadow: -2px 3px 4px #666;
            color: #fff;
        }

        .title--primary {
            font-size: 2rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .title--secondary {
            font-weight: 400;
            font-size: 1.25rem;
        }

        img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .content {
            display: flex;
            height: auto;
            overflow: hidden;
        }

        .task-input {
            position: relative;
            height: 3rem;
            padding: 25px;
        }

        .task-input span {
            position: absolute;
            top: 50%;
            color: rgba(153, 153, 153, 0.65);
            font-size: 20px;
            transform: translate(17px, -50%);
        }

        .task-input input {
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 14px;
            border-radius: 5px;
            padding: 0 20px 0 53px;
            border: 1px solid #999;
        }

        .task-input input:focus, .task-input input.active {
            padding-left: 0.2rem;
            border: 2px solid #f12711;
        }

        .task-input input::placeholder {
            color: #bfbfbf;
        }

        .task-input {
            padding: 0.2rem;
        }

        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(154, 14, 14, 0.71);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(65, 5, 5, 0.71);
        }

        .list__container--primary {
            display: flex;
            flex-direction: column;
            gap: var(--space-05);
            margin: var(--space-05);
            justify-content: space-between;
            overflow: scroll;

        }

        .list__item--primary {
            display: flex;
            flex-direction: column;
            border-radius: var(--space-025);
            border: 1px solid var(--bg-accent);
            background: linear-gradient(to right, var(--bg-accent), #fff);
            transition: all 400ms ease;
        }

        .list__item--primary-trash {
            display: flex;
            flex-direction: column;
            border-radius: var(--space-025);
            border: 1px solid var(--bg-accent);
            background: linear-gradient(to right, var(--bg-accent), rgba(213, 12, 66, 0.66));
            transition: all 400ms ease;
        }

        .list__item--primary-trash:hover {
            cursor: pointer;
        }

        [type="checkbox"] {
            display: none;
        }

        .list-input-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 2.25rem;
            margin-inline: var(--space-05);
        }

        .text--primary {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-clr);
            transition: all 866ms var(--easing1);
        }

        .text--secondary {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--blueGray-clr-4);
        }

        .list__container--secondary {
            transition: all 400ms var(--easing3);
            height: 0;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .list__item--secondary {
            display: flex;
            margin-inline: var(--space-05);
            padding-inline: var(--space-05);
            opacity: 0;
            transform: translateY(-6rem);
        }

        .icon {
            color: #ccc;
        }

        .list__item--primary:hover .list__container--secondary {
            height: 5.75rem;
            display: flex;
            flex-direction: column;
            transition-delay: 500ms;
        }

        .list__item--primary:hover .list__item--secondary {
            transition: transform 400ms var(--easing3), opacity 450ms var(--easing2);
            opacity: 1;
            transform: translateY(0);
        }

        .list__container--primary :checked + label .icon {
            color: var(--icon-clr);
            transform: scale(1.5);
            transition: all 266ms var(--easing1);
            transition-delay: 500ms;
        }

        .list__container--primary :checked + label .text--primary {
            animation: lineThrough 400ms forwards;
        }

        @keyframes lineThrough {
            0% {
                text-decoration: 2px line-through #0000;
            }
            100% {
                text-decoration: 2px line-through #000;
            }
        }

    </style>
</head>
<body class="antialiased">
<div class="wrapper">
    <article class="todo__container">
        <header class="header">
            <figure class="figure">
                <figcaption class="title__caption">
                    <h1 class="title title--primary">Todo's</h1>
                    <h2 class="title title--secondary">to-do list</h2>
                </figcaption>
            </figure>
        </header>
        <section class="content">
            <ul class="list__container list__container--primary" style="overflow-y: scroll;">
                <div class="task-input">
                    <span class="icon">
                        <i class="fa-regular fa-pen"></i>
                    </span>
                    <input type="text" placeholder="Add a New Task + Enter">
                </div>
                @foreach($listItems as $item)
                    <li class="list__item list__item--primary"
                        @if($item->is_done!=0)
                            onclick="fetch('{{ route('setDone') }}?id={{ $item->id }}&is_done=0')">
                        <input type="checkbox" id="{{ $item->id }}" class="{{ $item->id }}" checked>
                        @else
                            onclick="fetch('{{ route('setDone') }}?id={{ $item->id }}&is_done=1')">
                            <input type="checkbox" id="{{ $item->id }}" class="{{ $item->id }}">
                        @endif
                        <label for="{{ $item->id }}" class="list-input-label">
						<span class="text--primary">{{ $item->title }}
						</span>
                            <span class="icon"><i class="fas fa-check"></i></span>
                        </label>
                        @if(isset($item->description) and strlen($item->description)>=1)
                            <ul class="list__container list__container--secondary" hidden>
                                <li class="list__item list__item--secondary">
                                    <span class="text--secondary">{{ $item->description }}</span>
                                </li>
                            </ul>
                        @endif
                    </li>
                @endforeach
                <li class="list__item list__item--primary-trash"
                    onclick="fetch('{{ route('clearList') }}')">
                    <input type="checkbox" id="clear" class="clear">
                    <label class="list-input-label">
						<span class="text--primary">
                                Clear List
						</span>
                        <span class="icon"><i class="fas fa-trash"></i></span>
                    </label>
                </li>
                </li>

            </ul>
        </section>
    </article>
</div>
</body>
<script src="https://kit.fontawesome.com/9bdba8a8ac.js" crossorigin="anonymous"></script>
</html>
