<div class="container">
    <h3>Account Info</h3>
    <img src="" alt="">
    <span> User ID : {{Auth::user()->id}}</span> <br>
    <span> Name : {{Auth::user()->name}}</span> <br>
    <span> E-mail : {{Auth::user()->email}}</span>
    <h3>Your Current Orders </h3>
   <table class="table ">
    <thead class="thead-inverse">
        <tr>
            <th> FName  </th>
            <th> Lname  </th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>town</th>
            <th>Shipping</th>
            <th>Discount</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>

            @foreach ($orders as $order )
            <tr>
                <td>{{$order -> fname}}</td>
           <td>{{$order -> lname}}</td>
           <td>{{$order -> email}}</td>
           <td>{{$order -> phone}}</td>
           <td>{{$order -> address}}</td>
           <td>{{$order -> town}}</td>
           <td>{{$order -> shipping}}</td>
           <td>{{$order -> discount}}</td>
           <td>{{$order -> subtotal}}</td>
           <td>{{$order -> total}}</td>
           <td>{{$order -> status}}</td>
           <td><a href="{{Route('order.details' , ['order_details' => $order -> id])}}"> View Items</a></td>
            </tr>
            @endforeach

        </tbody>

</table>
</div>
