@extends('layout')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
           <h1 class="display-3">New Product</h1>
           @if ($errors->any())
             <div class="alert alert-danger">
                   <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                   </ul>
            </div>
            <br />
        @endif
           {!! Form::open(['url' => 'products']) !!}
            @csrf
            <div class="form-group">    
                <label for="sku">Nama Produk:</label>
                {!! Form::text('sku', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="name">Nama:</label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="description">Alamat:</label>
                {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="country">Inventory:</label>
                {!! Form::text('inventory', null, ['class' => 'form-control']) !!}
            </div>               
            <button type="submit" class="btn btn-primary">Create</button>
        {!! Form::close()!!}
       </div>
</div>
@endsection