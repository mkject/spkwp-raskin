@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> Edit Data Kriteria
                        <a href="{{ url('admin/kriteria') }}" class="btn btn-danger btn-sm float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                    <form action="{{ url('admin/kriteria/'.$criteria->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                    Product Color
                                </button>
                            </li> -->
                        </ul>

                        <!-- tab -->
                        <div class="tab-content" id="myTabContent">
                            
                            <!-- tab home -->
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Kriteria</label>
                                    <input type="text" name="kriteria" value="{{ $criteria->kriteria }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Pilih Bobot Kepentingan</label>
                                    <select name="kepentingan_id" class="form-control">
                                        @foreach($kepentingans as $kepentingan)
                                            <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Pilih Atribut</label>
                                    <select name="cost_benefit" class="form-control">
                                        <option value='Cost' <?php if($criteria->cost_benefit == 'Cost') echo "selected"?>>Cost</option>
                                        <option value='Benefit' <?php if($criteria->cost_benefit =='Benefit') echo "selected"?>>Benefit</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end tab home -->
                        </div>
                        <!-- end tab -->

                        <div class="py-2 float-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).on('click', '.updateProductColorBtn', function () {
            var product_id = "";
            var product_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

            if(qty <= 0) {
                alert('Quantity is required!')
                return false;
            }
            var data = {
                'product_id': product_id,
                'qty': qty
            };

            $.ajax({
                type: "POST",
                url: "/product-color/"+product_color_id,
                data: data,
                success: function (data) {
                    console.log(data);
                }
            });
        });

        $(document).on('click', '.deleteProductColorBtn', function () {
            var product_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type: "GET",
                url: "/admin/product-color/"+product_color_id+"/delete",
                success: function (response) {
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message);
                }
            });

        });
    });
</script>
@endsection
