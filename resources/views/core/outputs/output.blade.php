@extends("layouts.app")


@section("content")



<div class="wrapper">
    <div class="container sub-main-title mt-4 mb-4 pt-3">
        مخرج جديد
    </div>
    <div class="container " style="direction: rtl">
        <form method="POST" action="./output" id="outputForm">
            @csrf
            <div class="row d-flex flex-wrap justify-content-around">
                <div class="col-lg-3 col-md-6">


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="order_id">رقم الطلب</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="order_id" name="order_id">
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text">التاريخ</span>
                        <input type="date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="output_date" id="output_date" name="output_date">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text">الى الموظف</span>

                        <input class=" form-control" list="select_employee" id="employee" placeholder="اختر المورد">
                        @if($employees->count()>0)
                        <datalist id="select_employee">
                            @foreach ($employees as $employee)
                            <option data-customvalue={{ $employee->id }} value="{{ $employee->name }}">
                                @endforeach
                        </datalist>
                        @endif
                        <input type='hidden' name="employee" value="" id="employeeInput">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="note">ملاحظات</span>

                        <textarea class="form-control" placeholder="اكتب الملاحظات هنا" name="note" id="note"
                            style="height: -20px"></textarea>
                    </div>
                </div>

            </div>
            <!-- Form Wrapper & Button -->

            <div class="row">

                <div class="col">


                    <div class="card card-body mb-4">
                        <div class="row d-flex flex-wrap justify-content-around">
                            <div class="container sub-main-title mb-3">
                                أضف الاصناف للاخراج
                            </div>

                            <div class="row mb-2 p-3">
                                <div class="check-radio-wrapper">
                                    <div class="toggle_radio d-flex flex-wrap justify-content-around">
                                        <input type="radio" checked class="toggle_option" id="first_toggle"
                                            value="consume" name="toggle_option">
                                        <input type="radio" class="toggle_option" id="second_toggle" value="custody"
                                            name="toggle_option">

                                        <label for="first_toggle">
                                            <p>مستهلك</p>
                                        </label>
                                        <label for="second_toggle">
                                            <p>دائم</p>
                                        </label>

                                        <div class="toggle_option_slider">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="row d-flex flex-wrap justify-content-around">
                                    <div class="col-8 ">
                                        <div class="input-group mb-3">


                                            <span class="input-group-text">المنتج</span>
                                            <input class="form-control" list="selectProduct" id="inputProduct"
                                                placeholder="اختر منتج">

                                            @if($products->count()>0)
                                            <datalist id="selectProduct">
                                                @foreach ($products as $post)

                                                <option data-customvalue={{ $post->id }} value="{{ $post->product_name
                                                    }}">

                                                    @endforeach
                                            </datalist>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-4">العدد المتبقي: <span id="product_balance"> </span></div>
                                </div>



                            </div>
                            <div class="col-lg-2 col-md-6 d-flex align-items-center">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">العدد</span>
                                    <input type="number" class="form-control" id="quantity"
                                        aria-label="Sizing example input" aria-describedby="quantity" min="1">

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 d-flex align-items-center">
                                <div class=" input-group mb-3" id="custody_id_input">
                                    <!-- Custody  here-->
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 d-flex align-items-center">
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
                                    <th scope="col">الكود الخاص بالقطعة</th>
                                    <th scope="col">---</th>
                                </tr>
                            </thead>
                            <hr>
                            <tbody id="tests-table" name="productTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2 bd-highlight">
                    <button id="saveEntryButton" class="save-entry-button">حفظ</button>
                </div>
            </div>
        </form>


    </div>
</div>



<script>
    $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // jQuery methods go here...
            $("#saveEntryButton").on("click",function(e){

            var employee = $('#employee').val();
            var employeeValue= $('#select_employee [value="' + employee + '"]').data('customvalue');
            if(employeeValue==undefined){
            e.preventDefault();
            alert("ادخل موظف")
            }
            $("#employeeInput").val(employeeValue)
            })

            $('input[type=radio][name=toggle_option]').change(function() {
                    if (this.value == 'consume') {
                        $("#custody_id_input").empty();
                    }
                    else if (this.value == 'custody') {
                        $("#custody_id_input").append(

                        `<span class="input-group-text">هوية القطعة</span>
                        <input type="text" class="form-control" id="custody_id" aria-label="Sizing example input" aria-describedby="custody_id">`);
                    }
            });


            $("input[id=inputProduct]").focusout(function(){
                var inputProduct = $(this).val();
                var inputProductValue= $('#selectProduct [value="' + inputProduct + '"]').data('customvalue');
                if ( inputProductValue == null){
                    alert("اختر منتج صحيح");
                }else{

                    $.ajax({
                    type:"POST",
                    url: "{{ route('productBalance') }}",
                    data: { id: inputProductValue },
                    dataType: 'json',
                    success: function(res){
                    $("#product_balance").text(res.quantity);

                    }
                    });
                }


                });

    });





    var productArray = [


    ]
   async function onAdd(){
        //inputProduct
        var inputProduct = $('#inputProduct').val()
        var inputProductValue= $('#selectProduct [value="' + inputProduct + '"]').data('customvalue')
        //
        var quantity =$("#quantity").val();
        var custody_id =$("#custody_id").val();
        var quantityRealBalance = 0;
        await $.ajax({
        type:"POST",
        url: "{{ route('productBalance') }}",
        data: { id: inputProductValue },
        dataType: 'json',
        success: function(res){
        $("#product_balance").text(res.quantity);
        quantityRealBalance = res.quantity;

        }
        });



        if(Number(quantity) <= Number(quantityRealBalance)){

            if( inputProductValue && quantity && custody_id   ){
                    $('#inputProduct').val('');
                    $('#selectProduct').val('');
                    $('#quantity').val('');
                    $('#custody_id').val('');
                    $('#product_balance').text('');

                    let newProduct=
                    {
                        "inputProduct":inputProduct,
                        "inputProductValue":inputProductValue,
                        "quantity":quantity,
                        "custody_id":custody_id,
                    }
                    // console.log(newProduct);
                    productArray.push(newProduct);
                    addRow(productArray.length-1,newProduct);

                    // console.log("inputProduct:"+inputProductValue);
                    // console.log("quantity:"+quantity);
                    // console.log("custody_id:"+custody_id);
            }
            else if(inputProductValue && quantity){

                    $('#inputProduct').val('');
                    $('#selectProduct').val('');
                    $('#quantity').val('');
                    $('#product_balance').text('');

                    let newProduct=
                    {
                        "inputProduct":inputProduct,
                        "inputProductValue":inputProductValue,
                        "quantity":quantity,

                    }
                    // console.log(newProduct);
                    productArray.push(newProduct);
                    addRow(productArray.length-1,newProduct);
            }
            else{
                alert("أملاء كل الفراغات")
            }

        }
        else{
            alert("لا يوجد عدد كافي")
        }






    }



    //drop dowan data

    // for (var i in productArray) {
    //     addRow(i,productArray[i])
    // }
    function addRow(order,obj) {
        console.log($('input[type=radio][name=toggle_option]').value);
        ;
    var row = `<tr scope="row" class="test-row-${order}" name=products[${order}][]>
        <input type='hidden' name=products[${order}][inputProductValue] value="${obj.inputProductValue}">
        <input type='hidden'name=products[${order}][quantity] value="${obj.quantity}">

        ${obj.custody_id ==null? '':`<input type='hidden' name=products[${order}][custody_id] value='${obj.custody_id}'>`}

        <td>${order}</td>
        <td>${obj.inputProduct}</td>

        <td>${obj.quantity}</td>
        <td>${obj.custody_id ==null? '---':obj.custody_id}</td>

        <td>
            <button class=" btn btn-sm btn-danger" type="button" onclick="deleteRow(${order})" data-testid=${order} id="delete-${order}">حذف</button>


        </td>
    </tr>`;
    $('#tests-table').append(row)

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
