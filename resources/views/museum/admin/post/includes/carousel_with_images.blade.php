
<div class="row" style="margin-top: 20px">

    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
            <input type="file" name="image" class=" row justify-content-center">


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 25px">
                <ol class="carousel-indicators">

                    @for($i = 0; $i < count($imagelist); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active" style="background-color: #5a6268"></li>
                    @endfor

                </ol>

                <div class="carousel-inner">

                        <div class="carousel-item @if($imagelist[0]!=null) active @endif" style="height: 500px">
                            <img class="d-block w-100" src="{{asset('/storage/' . $imagelist[0])}}" alt="First slide">
                        </div>


                    @if(count($imagelist) > 0)
                        @for($i = 1; $i < count($imagelist); $i++)
                            <div class="carousel-item" style="height: 500px">
                                <img class="d-block w-100" src="{{asset('/storage/' . $imagelist[$i])}}" alt="Second slide">
                            </div>
                        @endfor
                    @endif

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>