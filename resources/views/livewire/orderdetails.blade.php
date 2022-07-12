<div class="container">
    <h2>Order Details</h2>
    <table class="table ">
        <thead class="thead-inverse">
            <tr>
                <th> Produc name</th>
                <th> Unit Price</th>
                <th> Quantity </th>
            </tr>
            </thead>

            <tbody>

                @foreach ($all_order_details as $row )
                <tr>
                    <td>{{$row -> product_name}}</td>
                    <td>{{$row -> price}}</td>
                    <td>{{$row -> qty}}</td>
                </tr>
                @endforeach

            </tbody>

    </table>
</div>
