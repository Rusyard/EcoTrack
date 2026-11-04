<div class="panel-left">
  <div class="brand-row"><span class="eco">eco</span><span class="track">EcoTrack</span></div>
  <h2 class="headline">{{ $headline }}</h2>
  <p class="subtext">{{ $subtext }}</p>

  <div class="feature-list">
    @foreach ($fitur as $item)
      @include('partials.fitur_card', ['fitur' => $item])
    @endforeach
  </div>
</div>
