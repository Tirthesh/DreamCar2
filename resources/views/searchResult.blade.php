
    <h3 class="page-title">@lang('quickadmin.products.title')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped @can('product_delete') dt-select @endcan">
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr data-entry-id="{{ $product->id }}">
                                <td field-key='name'>
                                    <a href="{{ 'product/'.$product->id }}" target="_blank">
                                        @if($product->photo1)
                                            <img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $product->photo1) }}"/>
                                        @endif
                                        <h3>{{ $product->name }}</h3>
                                        <h5>Category: 
                                        @foreach ($product->category as $singleCategory)
                                            <span class="label label-info label-many">{{ $singleCategory->name }}</span>
                                        @endforeach
                                        </h5>
                                        <h5>Make: {{ $product->make }}</h5>
                                        <h5>Model: {{ $product->model }}</h5>
                                        <h6>Details:<br />{{ $product->description }}</h6>
                                        <br />
                                        <h6>Keywords: {{ $product->keywords }}</h6>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@section('javascript') 
    <script>
        @can('product_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.products.mass_destroy') }}';
        @endcan

    </script>
@endsection