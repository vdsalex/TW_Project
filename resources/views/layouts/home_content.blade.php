@foreach($entries as $entry)

    @if($entry['memory_type']=='video')
        @include('includes.home.home_video',['entries'=>array($entry)])
    @endif

    @if($entry['memory_type']=='photo')
        @include('includes.home.home_photo',['entries'=>array($entry)])
    @endif

    @if($entry['memory_type']=='document')
        @include('includes.home.home_document',['entries'=>array($entry)])
    @endif

    @if($entry['memory_type']=='letter')
        @include('includes.home.home_letter',['entries'=>array($entry)])
    @endif

    @if($entry['memory_type']=='artefact')
        @include('includes.home.home_artefact',['entries'=>array($entry)])
    @endif
@endforeach