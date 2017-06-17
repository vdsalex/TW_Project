@foreach($entries as $entry)

    @if(get_class($entry)=='App\Video')
        @include('includes/memories_video',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Photo')
        @include('includes/memories_photo',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Document')
        @include('includes/memories_document',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Letter')
        @include('includes/memories_letter',['entries'=>array($entry)])
    @endif

    @if(get_class($entry)=='App\Artefact')
        @include('includes/memories_artefact',['entries'=>array($entry)])
    @endif
@endforeach