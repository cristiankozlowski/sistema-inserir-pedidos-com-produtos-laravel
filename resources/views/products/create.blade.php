@extends('layout.master')

@section('content')

<div class="container">

    <h1>Cadastrar Produto</h1>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" name="sku"
                class="form-control {{ ($errors->has('sku') ? 'is-invalid' : '') }}"
                placeholder="Digite o SKU do produto"
                value="{{old('sku')}}"
                maxlength="15"
                required
            />
            @if($errors->has('sku'))
                <div class="invalid-feedback">
                    {{$errors->first('sku')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name"
                    class="form-control {{ ($errors->has('name') ? 'is-invalid' : '') }}"
                    placeholder="Digite o nome do produto"
                    value="{{old('name')}}"
                    required
            />
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description"
                        class="form-control" cols="30" rows="10"
                        placeholder="Digite a descrição do produto"
                ></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="path_image">Imagem do Produto</label>
            <input type="file" name="path_image"
                    class="form-control {{ ($errors->has('path_image') ? 'is-invalid' : '') }}"
            />
            @if($errors->has('path_image'))
                <div class="invalid-feedback">
                    {{$errors->first('path_image')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" name="price" class="form-control mask_price {{ ($errors->has('price') ? 'is-invalid' : '') }}"
                    placeholder="Digite o preço do produto"
                    value="{{old('price')}}"
                    required
            />
        </div>

        <button type="submit" class="btn btn-sm btn-success mt-2">Cadastrar</button>
    </form>
</div>
@endsection
