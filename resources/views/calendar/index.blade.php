
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <link rel="stylesheet" href="css/style.css">
        <div class="cd-schedule margin-top-lg margin-bottom-lg js-cd-schedule">
            <form method="get" style="margin-left: 61px;margin-bottom: 5px;">
                <input type="week" id="lweek" name="lweek" value="{{$weekFilter}}">
                <input type="submit" value="Filtrar">
            </form>
            <div class="cd-schedule__events">
                <ul>
                    @foreach($days as $key=>$day)
                        <li class="cd-schedule__group">
                            <div class="cd-schedule__top-info">
                                <ul>
                                    <li><span>{{$daysNames[$key]}}</span></li>
                                    <span style="font-size:10px">{{$calendar[$day][0]['date']??''}}</span>
                                </ul>
                            </div>
                            <ul>
                                @foreach($calendar[$day] as $event)
                                    @if(is_null($event['data']))
                                        @continue;
                                    @endif
                                    <li class="cd-schedule__event">
                                        <a style="background-color: {{$event['data']['subject_color']}}" data-start="{{$event['data']['time_start']}}" data-end="{{$event['data']['time_end']}}" data-content="event-abs-circuit" data-event="event-1" >
                                            <p style="color:white;font-size:10px;">{{$event['data']['course_name']}}</p>
                                            <em class="cd-schedule__name">{{$event['data']['subject_name']}}</em>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="cd-schedule-modal">
                <header class="cd-schedule-modal__header">
                    <div class="cd-schedule-modal__content">
                        <span class="cd-schedule-modal__date"></span>
                        <h3 class="cd-schedule-modal__name"></h3>
                    </div>

                    <div class="cd-schedule-modal__header-bg"></div>
                </header>

                <div class="cd-schedule-modal__body">
                    <div class="cd-schedule-modal__event-info"></div>
                    <div class="cd-schedule-modal__body-bg"></div>
                </div>

                <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
            </div>

            <div class="cd-schedule__cover-layer"></div>
        </div>
    @endsection
<script src="js/util.js"></script>
<script src="js/main.js"></script>

