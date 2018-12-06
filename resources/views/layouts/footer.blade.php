<footer>
    <div class="row full-width footer">
        <div class="container">
            <div class="row full-width">
                <div class="col-md-4 bootcamps">
                <h2 class="title">{{__('messages.comparison')}}</h2>
                    @foreach($bootcamps as $com)
                        <a href="/compare/{{$com[2]}}-vs-{{$com[1]}}-vs-{{$com[0]}}?>" class="text">
                            <p>{{$com[2]}} vs {{$com[1]}} vs {{$com[0]}}</p>
                        </a>
                    @endforeach
                </div>
                <div class="col-md-4 bootcamps">
                    <h2 class="title">{{__('messages.about4Geeks')}}</h2>
                        @foreach($menuFooter->items as $key => $dataMenuFooter)
                            <a href="{{$dataMenuFooter->url}}" class="text">
                                <p>{{$dataMenuFooter->title}}</p>
                            </a>
                        @endforeach
                </div>
            </div>
            <div class="row full-width row-copyright">
                    <div class="col-2 col-sm-1 text-left order-1">
                        <img style="max-height: 40px;" src="https://www.4geeksacademy.co/wp-content/themes/the-fastest/assets/img/icon-logo.png">
                    </div>
                    <div class="col-12 col-sm-5 order-4 text-left order-sm-2">
                        Copyright © 4Geeks Academy LLC 2017. <br> {{__('messages.allRightReserved')}}
                    </div>

                    <div class="col-10 col-sm-6 text-right order-3">
                        <ul class="list-unstyled list-inline social-media">
                            <li class="list-inline-item"><a target="_blank" href="https://github.com/4geeksacademy"><img src=""></a></li>
                            <li class="list-inline-item"><a target="_blank" href="https://facebook.com/4geeksacademy"><img src=""></a></li>
                            <li class="list-inline-item"><a target="_blank" href="https://instagram.com/4geeksacademy"><img src=""></a></li>
                            <li class="list-inline-item"><a target="_blank" href="https://twitter.com/4GeeksAcademy"><img src=""></a></li>
                            <li class="list-inline-item"><a target="_blank" href="https://www.youtube.com/channel/UC1ZyAx5eyV9gTFWpHPs9-GA"><img src=""></a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{env('SITE_URL')}}/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</footer>