
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="cd-schedule margin-top-lg margin-bottom-lg js-cd-schedule">
            <form method="get" style="margin-left: 61px;margin-bottom: 5px;">
                <input type="week" id="lweek" name="lweek" value="">
                <input type="submit" value="Filtrar">
            </form>
            <div class="cd-schedule__events">
                <ul>
                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info">
                            <ul>
                                <li><span>Lunes</span></li>
                                <span style="font-size:10px"></span>
                            </ul>
                        </div>
                        <ul>
                            <li class="cd-schedule__event">
                                <a style="" data-start="" data-end="" data-content="event-abs-circuit" data-event="event-1" >
                                    <p style="color:white;font-size:10px;"></p>
                                    <em class="cd-schedule__name"></em>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info">
                            <ul>
                                <li><span>Martes</span></li>
                                <span style="font-size:10px"></span>
                            </ul>
                        </div>
                        <ul>
                            <li class="cd-schedule__event">
                                <a style="" data-start="" data-end="" data-content="event-abs-circuit" data-event="event-1" >
                                    <p style="color:white;font-size:10px;"></p>
                                    <em class="cd-schedule__name"></em>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info">
                            <ul>
                                <li><span>Miercoles</span></li>
                                <span style="font-size:10px"></span>
                            </ul>
                        </div>
                        <ul>
                            <li class="cd-schedule__event">
                                <a style="" data-start="" data-end="" data-content="event-abs-circuit" data-event="event-2" >
                                    <p style="color:white;font-size:10px;"></p>
                                    <em class="cd-schedule__name"></em>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info">
                            <ul>
                                <li><span>Jueves</span></li>
                                <span style="font-size:10px"></span>
                            </ul>
                        </div>
                        <ul>
                            <li class="cd-schedule__event">
                                <a style="" data-start="" data-end="" data-content="event-abs-circuit" data-event="event-1" >
                                    <p style="color:white;font-size:10px;"></p>
                                    <em class="cd-schedule__name"></em>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info">
                            <ul>
                                <li><span>Viernes</span></li>
                                <span style="font-size:10px"></span>
                            </ul>
                        </div>
                        <ul>
                            <li class="cd-schedule__event">
                                <a style="" data-start="" data-end="" data-content="event-abs-circuit" data-event="event-1" >
                                    <p style="color:white;font-size:10px;"></p>
                                    <em class="cd-schedule__name"></em>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info">
                            <ul>
                                <li><span>Sábado</span></li>
                                <span style="font-size:10px"></span>
                            </ul>
                        </div>
                        <ul>
                            <li class="cd-schedule__event">
                                <a style="" data-start="" data-end="" data-content="event-abs-circuit" data-event="event-1" >
                                    <p style="color:white;font-size:10px;"></p>
                                    <em class="cd-schedule__name"></em>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info">
                            <ul>
                                <li><span>Domingo</span></li>
                                <span style="font-size:10px"></span>
                            </ul>
                        </div>
                        <ul>
                            <li class="cd-schedule__event">
                                <a style="" data-start="" data-end="" data-content="event-abs-circuit" data-event="event-1" >
                                    <p style="color:white;font-size:10px;"></p>
                                    <em class="cd-schedule__name"></em>
                                </a>
                            </li>
                        </ul>
                    </li>

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

