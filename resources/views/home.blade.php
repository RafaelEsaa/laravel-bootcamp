@extends('layouts.app', array('menu' => $menu, 'menuFooter' => $menuFooter, 'bootcamps' => $bootcamps))

@section('content')
<div class="row full-width">
    <div class="col-md-12" 
        style="background-image: url('img/banner.jpg'); 
                height: 100vh; 
                width: 100%;
                background-size: cover">

        <section class="header-text">
            <div>
                <span class="first-text">{{__('messages.all')}}</span>
                <span class="second-text">{{__('messages.schools')}}</span>
                <p>{{__('messages.selectSchools')}} 
                    <span>[
                        <span class="select-header">
                            <select>
                                <option selected="">4Geeks Academy</option>
                            </select>
                        </span>
                        &nbsp]</span>
                </p>
            </div>
        </section>
    </div>
</div>

<div class="container">
    <div class="row grid-home">
        <!-- Contador para no mostrar 4Geeks -->
        @php 
            $i = 0
        @endphp
        @foreach ($schools as $com)
            @php 
                $i++
            @endphp
        <!-- Se muestran las escuelas, menos 4Geeks -->
            @if($i != 1)
                <div id="{{$com->slug}}" 
                class="col-lg-3 col-md-3 col-6 <?php if($i%2 == 0){?> bg-blue-home bootcamp-box <?php }else if($i%2 != 0){?> bg-white-home bootcamp-box <?php }?>" data-target="<?php echo $com->slug?>" onclick="bootcampsSelected(this)">
                    <p class="text-select text-center" style="visibility:hidden;">{{__('messages.secondOption')}}</p>
                    <h2 class="title-bootcamp text-center">{{$com->title}}</h2>
                    <div class="img-grid-compare" style="background-image: url('{{ env('API_URL') }}/logos/{{$com->slug}}.png');">
                    </div>
                    <span>
                        <button class="text-center w-100 btn-right">{{__('messages.compare')}}</button>
                    </span>
                </div>
            @endif
        @endforeach
    </div>
</div>
    
@endsection