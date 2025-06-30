@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Sub Kriteria</h2>
    <form method="POST" action="{{ route('subkriteria.update', $sub->id_sub_kriteria) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Kriteria</label>
            <select name="id_kriteria" class="form-control" required>
                @foreach($kriterias as $k)
                    <option value="{{ $k->id_kriteria }}" {{ $k->id_kriteria == $sub->id_kriteria ? 'selected' : '' }}>
                        {{ $k->nama_kriteria }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nama Sub Kriteria</label>
            <input type="text" class="form-control" name="nm_sub_kriteria" value="{{ $sub->nm_sub_kriteria }}" required>
        </div>
        <div class="form-group">
            <label>Nilai</label>
            <input type="number" class="form-control" name="nilai" value="{{ $sub->nilai }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
