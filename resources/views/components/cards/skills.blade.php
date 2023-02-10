@props(['skills'])

@php
$labourSkills = explode('-', $skills);
@endphp

@foreach ($labourSkills as $skill)
<span class="badge badge-primary rounded-pill d-inline">{{ $skill }}</span>
@endforeach