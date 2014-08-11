@extends('layout')
@section('content')

<div class="container">

  <h1>{{ $candidate->user->full_name }}</h1>

  <p>
    Categoría:
    <a href="{{ route('category', [$candidate->category->slug, $candidate->category->id] ) }}">
      {{ $candidate->category->name }}
    </a>
  </p>

  <p>
    Tipo de trabajo:
    {{ $candidate->job_type_title }}
  </p>

  <p>
    Website:
    <a href="{{ $candidate->website_url }}" target="_blank">
    {{ $candidate->website_url }}
    </a>
  </p>

  <h4>Descripción</h4>
  {{ $candidate->description }}

  @if(is_admin())
    <p>
    <a href="{{route('admin_candidate_edit', [$candidate->id])}}" class="btn">Editar al candidato</a>
  </p>
  @endif
</div>
@endsection
