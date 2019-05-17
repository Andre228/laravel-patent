
<div class="row" style="margin-top: 20px">

    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
            <input type="file" name="image" class="btn btn-dark">

    @if(!$imagelist->isEmpty())
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 25px">
                <ol class="carousel-indicators">

                    @for($i = 0; $i < count($imagelist); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active" style="background-color: #5a6268"></li>
                    @endfor

                </ol>

                <div class="carousel-inner">

                    @if(count($imagelist) > 0)
                        @for($i = 0; $i < count($imagelist); $i++)
                            <div class="carousel-item @if($i === 0) active @endif" style="height: 500px" >
                                <form method="POST" id="destroy-form" action="{{route('museum.admin.images.destroy', $imagelist[$i]->id)}}">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" style="margin-left: 300px"  aria-hidden="true">
                                        <i class="fas fa-trash-alt fa-2x"></i>
                                    </button>

                                </form>
                                <img class="d-block w-100 h-100" src="{{asset('/storage/' . $imagelist[$i]->alias)}}" alt="Second slide">
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
    @endif
        </div>
    </div>
</div>


<script>

</script>