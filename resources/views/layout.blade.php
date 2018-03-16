{{-- {{ dd( auth()->user()->roles->toArray() ) }} --}}

@if(auth()->check())
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta name="_token" content="{{ csrf_token() }}"/>

            <title>@yield('name', 'Def') | Bazar</title>

            <script src="/js/app.js"></script>
            @include('ss.scripts')
            @include('ss.styles')
            
            
        </head>

        <body>
            <div id="theme-wrapper">

                @include('components.header')
                
                <div id="page-wrapper" class="container">
                    <div class="row">

                        @include('components.nav')

                        <div id="content-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <section>
                                                @yield('header')
                                            </section>                         

                                            <div class="clearfix">
                                                <h1 class="pull-left">@yield('title')</h1>
                                            </div>

                                            <section>
                                                @yield('button')
                                            </section>  
                                        </div>
                                    </div>
                                    <br>

                                    <section>
                                        @yield('content')
                                    </section>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('ss.scripts')
            <script src="{{asset('plugins/js/app.js')}}"></script>
        </body>
    </html>
@endif