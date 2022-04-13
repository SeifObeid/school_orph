@extends("layouts.app")


@section("content")



<div class="wrapper">
    <div class="container sub-main-title-edit"> تعديل على مدخل </div>
    <div class="container " style="direction: rtl">
        <form method="post" action="{{ route(Request::segment(1).'.entry.update') }}" id="entryForm">
            @csrf
            @method('put')
            <input type='hidden' name="entryId" value="{{ $entry->id }}">
            <div class="row d-flex flex-wrap justify-content-around">
                <div class="col-lg-3 col-md-6">


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="invoiceNumber">رقم الفاتورة</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="invoiceNumber" name="invoiceNumber" value="{{ $entry->invoice_number }}">
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text">التاريخ</span>
                        <input type="date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="entryDate" id="entryDate" name="entryDate" value="{{ $entry->date }}">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text">المورد</span>

                        <input class=" form-control" list="selectSupplier" id="supplier" placeholder="اختر المورد"
                            value="{{  $entry->supplier->name}}">
                        @if($suppliers->count()>0)
                        <datalist id="selectSupplier">
                            @foreach ($suppliers as $supplier)

                            <option data-customvalue={{ $supplier->id }} value="{{ $supplier->name }}">
                                @endforeach
                        </datalist>
                        @endif
                        <input type='hidden' name="supplier" value="" id="supplierInput">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="note">ملاحظات</span>
                        {{-- <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="note"> --}}
                        <textarea class="form-control" placeholder="اكتب الملاحظات هنا" name="note" id="note"
                            style="height: -20px">{{ $entry->note }}</textarea>
                    </div>
                </div>

            </div>
            <!-- Form Wrapper & Button -->
            {{-- <div class="form-wrapper " style="width: 61%;">

                <input class="form-control" placeholder=" Enter no of articels" type="number" id="test-result"
                    style="margin: 10px;">
                <button class="btn btn-sm btn-info" id="create-test" style="margin: 10px;">Add</button>
            </div> --}}
            <div class="row">
                <div class="col">


                    <div class="card card-body mb-4">
                        <div class="row d-flex flex-wrap justify-content-around">
                            <div class="col-lg-3 col-md-6">


                                <div class="input-group mb-3">


                                    <span class="input-group-text">المنتج</span>
                                    <input class="form-control" list="selectProduct" id="inputProduct"
                                        placeholder="اختر منتج">

                                    @if($products->count()>0)
                                    <datalist id="selectProduct">
                                        @foreach ($products as $product)

                                        <option data-customvalue={{ $product->id }} value="{{ $product->product_name
                                            }}">

                                            @endforeach
                                    </datalist>
                                    @endif

                                </div>

                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-center">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">العدد</span>
                                    <input type="number" class="form-control" id="quantity"
                                        aria-label="Sizing example input" aria-describedby="quantity" min="1">

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-center">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">سعر الوحدة</span>
                                    <input type="text" class="form-control" id="unitPrice"
                                        aria-label="Sizing example input" aria-describedby="unitPrice">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-center">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-success" onclick="onAdd()">أضف منتج
                                        جديد</button>
                                </div>
                            </div>

                        </div>
                        <!-- Data Table -->
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">###</th>
                                    <th scope="col">المنتج</th>
                                    <th scope="col">العدد</th>
                                    <th scope="col">سعر الوحدة</th>
                                    <th scope="col">---</th>
                                </tr>
                            </thead>
                            <hr>
                            <tbody id="products-table" name="productTable">
                                @if($productEntries->count()>0)
                                @foreach ($productEntries as $index => $productEntry)
                                <tr scope="row" class="test-row-{{ $index }}" name=products[{{ $index }}][]>
                                    <input type='hidden' name=products[{{ $index }}][productEntriesId]
                                        value="{{ $productEntry->id }}">

                                    <input type='hidden' name=products[{{ $index }}][inputProductValue]
                                        value="{{ $productEntry->product->id }}">

                                    <input type='hidden' name=products[{{ $index }}][quantity]
                                        value="{{ $productEntry->quantity }}">
                                    <input type='hidden' name=products[{{ $index }}][unitPrice]
                                        value="{{ $productEntry->price }}">

                                    <td>{{ $index }}</td>
                                    <td>{{ $productEntry->product->product_name }}</td>

                                    <td>{{ $productEntry->quantity }}</td>
                                    <td>{{ $productEntry->price }}</td>

                                    <td>
                                        <button class=" btn btn-sm btn-danger" type="button"
                                            onclick="deleteRow({{ $index }})" data-testid={{ $index }}
                                            id="delete-{{ $index }}">حذف</button>


                                    </td>
                                </tr>

                                @endforeach
                                @endif



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2 bd-highlight">
                    <button id="saveEntryButton" class="save-entry-button">حفظ التعديل</button>
                </div>
            </div>
        </form>


    </div>
</div>



<script>
    $(document).ready(function(){

            // jQuery methods go here...
            $("#saveEntryButton").on("click",function(e){

            var supplier = $('#supplier').val();
            var supplierValue= $('#selectSupplier [value="' + supplier + '"]').data('customvalue');
            if(supplierValue==undefined){
            e.preventDefault();
            alert("ادخل مورد")
            }
            $("#supplierInput").val(supplierValue)
            })

    });


    var newId = 4
    var newTest = { 'name': null, 'id': newId, 'Articels': null }

    var productArray = [


    ]
    function onAdd(){
        //inputProduct
        var inputProduct = $('#inputProduct').val()
        var inputProductValue= $('#selectProduct [value="' + inputProduct + '"]').data('customvalue')
        //
        var quantity =$("#quantity").val();
        var unitPrice =$("#unitPrice").val();

        if(inputProductValue&&quantity&&unitPrice){
            $('#inputProduct').val('')
            $('#selectProduct').val('')
            $('#quantity').val('')
            $('#unitPrice').val('')
            let newProduct={
         "inputProduct":inputProduct,
         "inputProductValue":inputProductValue,
            "quantity":quantity,
            "unitPrice":unitPrice,}
            productArray.push(newProduct);
            addRow(productArray.length-1 + {{ $productEntries->count() }},newProduct);


        }



    }








    function addRow(order,obj) {
    var row = `<tr scope="row" class="test-row-${order}" name=products[${order}][]>
        <input type='hidden' name=products[${order}][inputProductValue] value="${obj.inputProductValue}">
        <input type='hidden'name=products[${order}][quantity] value="${obj.quantity}">
        <input type='hidden'name=products[${order}][unitPrice] value="${obj.unitPrice}">

        <td>${order}</td>
        <td>${obj.inputProduct}</td>

        <td>${obj.quantity}</td>
        <td>${obj.unitPrice}</td>

        <td>
            <button class=" btn btn-sm btn-danger" type="button" onclick="deleteRow(${order})" data-testid=${order} id="delete-${order}">حذف</button>


        </td>
    </tr>`
    $('#products-table').append(row)

    $(`#delete-${obj.id}`).on('click', deleteRow)

    $(`#save-${obj.id}`).on('click', onSave)


    }

    function onSave() {
                console.log('Saved!')
                var testid = $(this).data('testid')
                var saveBtn = $(`#save-${testid}`)
                var row = $(`.test-row-${testid}`)
                saveBtn.prop('disabled', true)
                row.css('opacity', "0.5")
                setTimeout(function () {
                row.css('opacity', '1')
                }, 2000)
    }
    function deleteRow(id) {

                var row = $(`.test-row-${id}`)
                row.remove()
    }


</script>
@endsection
