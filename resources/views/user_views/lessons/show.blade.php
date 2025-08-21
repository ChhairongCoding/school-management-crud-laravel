@if ($lesson->video_type === 'local')

    {{-- Player for your locally uploaded videos --}}
    <div class="bg-black rounded-lg overflow-hidden">
        <video width="100%" controls controlsList="nodownload">
            <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

@elseif ($lesson->video_type === 'youtube')

    {{-- YouTube videos must be embedded in an iframe --}}
    @php
        // Converts a regular YouTube URL into an embeddable URL
        $youtubeId = substr(parse_url($lesson->video_url, PHP_URL_PATH), 1);
    @endphp
    <div class="aspect-w-16 aspect-h-9">
        <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                class="w-full h-full rounded-lg">
        </iframe>
    </div>

@endif
