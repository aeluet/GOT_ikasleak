<html><body><ul>
@foreach($ekitaldiak as $e)
  <li>{{ $e->izenburua }} — {{ $e->kategoria->izena }}</li>
@endforeach
</ul></body></html>