<div class="modal-body">

    <script src="{{ asset('js/jquery.min.js') }}" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/select2.min.js') }}"></script>

      {{-- success message --}}
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        {{-- show pannels in table --}}

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Panel</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($panel->tabs as $tab)
                <tr>
                    <td>{{ $tab->name }}</td>
                    <td>
                        @foreach($tab->distripution_product as $product)
                        {{ $product->abb_description }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($tab->distripution_product as $product)
                        {{ $product->pivot->quantity }} <br>
                        @endforeach
                    </td>
                    <td>
                        <button wire:click="edit({{ $tab->id }})" class="btn btn-primary btn-sm">Edit</button>
                        {{-- a href to show  --}}

                        <a href="{{ route('panelStatisics', $tab->id) }}" class="btn btn-primary btn-sm">Show</a>
                    


                        <button wire:click="delete({{ $tab->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>



    @include('livewire.projects.create')
    @include('livewire.edit-tabs')


    <div class="row justify-content-end mt-3 mb-3">
        {{-- button to return to bannel --}}
        <button wire:click="back" class="btn btn-primary mr-3">Back To Panel</button>
        {{-- button to add tabs --}}
        <button wire:click.prevent="addTab" class="btn btn-info ">Add Tab one By one</button>
    </div>
    <script>
        $(document).ready(function() {
            window.initSelectProductDrop = () => {
                $('.js-example-basic-single{{ $i }}').select2({
                    placeholder: 'Select a Product'
                    , allowClear: true
                });
            }
            initSelectProductDrop();
            $('.js-example-basic-single{{ $i }}').on('change', function(e) {
                console.log(e.target);
                livewire.emit('selectedProductItem', e.target.value)
            });
            window.livewire.on('select2', () => {
                initSelectProductDrop();
            });

        });

    </script>

    <style>
        body>div>div.content-wrapper>div>div>div>div.Added>div>div.form-group.col-md-6>span>span.selection>span,
        body>div>div.content-wrapper>div>div>div>div.row>div:nth-child(1)>span>span.selection>span ,
        #innerboxdel > div > div.modal-body > div.Added > div > div.form-group.col-md-6 > span > span.selection > span{
            height: 38px !important;
        }

    </style>

</div>
