@foreach($entries as $entry)

    @if(get_class($entry)=='App\Video')
        @include('includes.home.home_video',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Photo')
        @include('includes.home.home_photo',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Document')
        @include('includes.home.home_document',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Letter')
        @include('includes.home.home_letter',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Artefact')
        @include('includes.home.home_artefact',['entries'=>array($entry)])
    @endif
@endforeach