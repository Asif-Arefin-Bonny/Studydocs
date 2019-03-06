<div class="col-lg-3 col-md-6 mb-4">
   @if(isset($note)) 
     <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $note->name }}</h5>
            <p class="card-text">{{ $note->description }}
            </p>
            <small>{{ $note->category->name }}</small>
            <a href="{{ route('show-note', ['id' => $note->id]) }}" class="card-link">Details>></a>
        </div>
      </div>
  @else
    <p>Nothing to display yet!</p>
  @endif
</div>
