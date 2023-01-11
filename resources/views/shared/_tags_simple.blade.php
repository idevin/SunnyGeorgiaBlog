@foreach($tags as $tag)
    @if($tag->slug && $loop->iteration <= 3)
            #{{$tag->name}}
        @if(!$loop->last)
            &nbsp
        @endif
    @endif
@endforeach
