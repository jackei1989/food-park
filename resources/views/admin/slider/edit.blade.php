@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Slider</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>offer</label>
                        <input type="text" name="offer" class="form-control" value="{{ $slider->offer }}">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                    </div>
                    <div class="form-group">
                        <label>Sub Title</label>
                        <input name="sub_title" type="text" class="form-control" value="{{ $slider->sub_title }}">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea type="text" name="short_description" class="form-control">{{ $slider->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Button link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $slider->button_link }}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option @selected($slider->status === 1) value="1">Active</option>
                            <option @selected($slider->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($slider->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
